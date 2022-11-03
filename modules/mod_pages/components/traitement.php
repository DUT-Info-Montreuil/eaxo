
<?php
    require_once("./connexion.php");
    class SaveExerice extends Connexion{

        private $userID;
        public function __construct()
        {
            /*if(isset($_SESSION["newsession"])) {
                $value = $_POST["exoJson"];
                //echo $_SESSION["newsession"];
                $this->save(json_decode($value));
            } else {
                echo "erreur";
            }*/
        }

        public function loadChildren($element, $parent, $callback, $continue) {
            if($continue) {
                if(!is_int($element)) {
                    $parentID = NULL;
                    if($parent != null) {
                        
                    }

                    $jsonClass = is_object($element->classList) ?  json_encode($element->classList) : "";
                    $nodeID = isset($element->nodeID) ? $element->nodeID : "";

                    
                    //echo($element->nodeName . " parent ". $parent->nodeName);
                    $jsonCss =  is_object($element->style) ? json_encode($element->style) : "";
                    $jsonContent =  property_exists($element, "textContent") ? json_encode($element->textContent) : "";


                    //var_dump($jsonContent);
                    $nodeName = isset($element->nodeName) ? $element->nodeName : "";
                    if($nodeName == "") {
                        var_dump($element);
                    }
                    $sth = self::$bdd->prepare('INSERT INTO widgets_elements (widgetId, parentId, wType, class, content, css) values(:nodeID, 1, :nodeName, :jsonClass, :jsonContent, :jsonCss)');
                    //echo("INSERT INTO widgets_elements (widgetId, parentId, wType, class, content, css) VALUES ($nodeID, 1, $nodeName)\n");
                    $sth->execute(array(":nodeID" => $nodeID, ":nodeName" => $nodeName, ":jsonClass" => $jsonClass, ":jsonContent" => $jsonContent, ":jsonCss" => $jsonCss));
                }   
                //var_dump($sth);
                if(isset($element->children)) {
                    foreach($element->children as $child) {
                        $this->loadChildren($child, $element, $callback, $continue);
                        
                    }
                }

                //If error, stop
                /*
                    $continue = false;
                */
            } else {
                $callback(false);
            }

            


            //echo $element->nodeID;
            
        }


        public function save() {
            
            ob_clean();

            if(isset($_SESSION["newsession"])) {
                $this->userID = $_SESSION["newsession"];

                $value = json_decode($_POST["exoJson"]);

                try {
                    self::$bdd->beginTransaction();

                    foreach($value->children as $key) {
                        $this->loadChildren($key, null, function($result) {
                            if(!$result) {
                                self::$bdd->rollback();
                            }
                        }, true);
                    }

                    self::$bdd->commit();

                } catch(PDOException $e) {
                    self::$bdd->rollback();
                    die($e->getMessage());
                }
                
                
            }
            
            
            
        }


    }
    
    
    
    new SaveExerice();
?>