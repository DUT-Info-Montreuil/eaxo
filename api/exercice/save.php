<?php
    require_once "../api.php";
    class SaveExerice extends Api{

        private $userID;
        public function __construct()
        {

            if(isset($_SESSION["newsession"])) {
                $value = $_POST["exoJson"];
                //echo $_SESSION["newsession"];
                $this->save(json_decode($value));
            } else {
                echo json_encode("not connected");
            }
        }

        public function loadChildren($exoID, $element, $parent, $callback, $continue) {
            if($continue) {
                if(!is_int($element)) {
                    var_dump($element->nodeID);
                    $parentID = isset($parent) ? $parent->nodeID : null;
                    var_dump($exoID);
                    if($parent != null) {
                        
                    }
                    
                    $jsonClass = is_object($element->classList) ?  json_encode($element->classList) : "{}";
                    $nodeID = isset($element->nodeID) ? intval($element->nodeID) : null;
                    $dataset = isset($element->dataset) ? json_encode($element->dataset) : "";


                    $jsonCss =  is_object($element->style) ? json_encode($element->style) : "";
                    $jsonContent =  property_exists($element, "textContent") ? json_encode($element->textContent) : "";


                    //var_dump($jsonContent);
                    $nodeName = isset($element->nodeName) ? $element->nodeName : "";
                    if($nodeName == "") {
                        var_dump($element);
                    }
                    
                    $sth = self::$bdd->prepare('INSERT INTO exercice_elements (exerciceId, parentId, htmlID, wType, dataset, class, content, css)'
                    . 'values(:exoID, :parentID, :htmlID, :nodeName, :dataset, :jsonClass, :jsonContent, :jsonCss)');

                    $sth->execute(array(":exoID" => $exoID, ":parentID" => $parentID, ":htmlID" => $nodeID, ":dataset" => $dataset, ":nodeName" => $nodeName, ":jsonClass" => $jsonClass,
                    ":jsonContent" => $jsonContent, ":jsonCss" => $jsonCss));
                    
                }   
                //var_dump($sth);
                if(isset($element->children)) {
                    foreach($element->children as $child) {
                        $this->loadChildren($exoID, $child, $element, $callback, $continue);
                        
                    }
                }

            } else {
                $callback(false);
            }
        }

        public function getExercice($exoId, $userID) {
            $params = array(":userID" => $userID, ":exoID" => $exoId);

            $sql = "SELECT e.id as exoID, e.userID FROM exercices as e WHERE e.exoNumber = :exoID AND e.userID = :userID";
            $sth = self::$bdd->prepare($sql);
            $sth->execute($params);
            $result = $sth->fetch();

            if(!$result) {
                $insertSQL = "INSERT INTO exercices (userID, exoNumber) VALUES (:userID, :exoID)";
                $sth = self::$bdd->prepare($insertSQL);
                $sth->execute($params);

                //Get exo database ID
                $sth2 = self::$bdd->prepare("SELECT id as exerciceId FROM exercices as ex WHERE ex.userID = :userID AND ex.exoNumber = :exoID");
                $sth2->execute($params);
                return array("userID" => $userID, "exoID" => $sth2->fetch()["exerciceId"]);
            } else {
                $dropSQL = "DELETE FROM exercice_elements WHERE exerciceId IN (SELECT id as exerciceId FROM exercices as ex WHERE ex.userID = :userID AND ex.exoNumber = :exoID)";
                $sth = self::$bdd->prepare($dropSQL);
                $sth->execute($params);
                
                return $result;
            }
        }

        public function save() {
            
            if(isset($_SESSION["newsession"])) {
                $this->userID = $_SESSION["newsession"];
                $exerciceID = $_SESSION["exoID"];

                $value = json_decode($_POST["exoJson"]);

                //Check if we need to insert new exercice into database
                $dataExo = $this->getExercice($exerciceID, $this->userID);
                
                
                try {
                    
                    self::$bdd->beginTransaction();

                    foreach($value->children as $key) {
                        $this->loadChildren($dataExo["exoID"], $key, null, function($result) {
                            if(!$result) {
                                self::$bdd->rollback();
                                return $this->isOk(false);
                            }
                        }, true);
                    }

                    self::$bdd->commit();
                    $this->isOk(true);

                } catch(PDOException $e) {
                    self::$bdd->rollback();
                    die($e->getMessage());
                }
            }
        }

        public function isOk($ok) {
            if($ok) {
                
                echo json_encode("oui");
                
            } else {
                echo json_encode("non");
            }
        }
    }
    new SaveExerice();
?>