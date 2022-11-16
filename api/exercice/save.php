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

        public function loadChildren($element, $parent, $callback, $continue) {
            if($continue) {
                if(!is_int($element)) {
                    $parentID = isset($parent) ? $parent->nodeID : null;
                    
                    if($parent != null) {
                        
                    }
                    
                    $jsonClass = is_object($element->classList) ?  json_encode($element->classList) : "";
                    $nodeID = isset($element->nodeID) ? intval($element->nodeID) : null;


                    $jsonCss =  is_object($element->style) ? json_encode($element->style) : "";
                    $jsonContent =  property_exists($element, "textContent") ? json_encode($element->textContent) : "";


                    //var_dump($jsonContent);
                    $nodeName = isset($element->nodeName) ? $element->nodeName : "";
                    if($nodeName == "") {
                        var_dump($element);
                    }
                    
                    $sth = self::$bdd->prepare('INSERT INTO exercice_elements (exerciceId, parentId, htmlID, wType, class, content, css)'
                    . 'values(:exoID, :parentID, :htmlID, :nodeName, :jsonClass, :jsonContent, :jsonCss)');

                    $sth->execute(array(":exoID" => 1, ":parentID" => $parentID, ":htmlID" => $nodeID, ":nodeName" => $nodeName, ":jsonClass" => $jsonClass,
                    ":jsonContent" => $jsonContent, ":jsonCss" => $jsonCss));
                    
                    var_dump($sth);
                }   
                //var_dump($sth);
                if(isset($element->children)) {
                    foreach($element->children as $child) {
                        $this->loadChildren($child, $element, $callback, $continue);
                        
                    }
                }

            } else {
                $callback(false);
            }
        }

        public function save() {

            if(isset($_SESSION["newsession"])) {
                $this->userID = $_SESSION["newsession"];

                $value = json_decode($_POST["exoJson"]);
                //var_dump($value);
                try {
                    
                    self::$bdd->beginTransaction();

                    foreach($value->children as $key) {
                        $this->loadChildren($key, null, function($result) {
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