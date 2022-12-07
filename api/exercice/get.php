<?php
    require_once "../api.php";

    class GetExercice extends Api {
        public function __construct()
        {
            $this->exec();
        }


        public function exec() {
            $exoID = isset($_SESSION["exoID"]) ? $_SESSION["exoID"] : false;

            if($exoID && isset($_SESSION["newsession"])) {
                $params = array(":userID" => intval($_SESSION["newsession"]), ":exoID" => $exoID);
                $sql = "SELECT parentId, htmlID, wType, dataset, class, content, css FROM exercice_elements WHERE exerciceId IN (SELECT id as exerciceId FROM exercices as ex WHERE ex.userID = :userID AND ex.exoNumber = :exoID) ORDER BY id";
                $sth = self::$bdd->prepare($sql);
                $sth->execute($params);
                $result = $sth->fetchAll();


                echo json_encode($result);
            }
            else {
                echo "Non autorisé";
            }
            
        }

    
    }

    new GetExercice();
?>