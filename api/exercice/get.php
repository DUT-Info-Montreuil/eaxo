<?php
    require_once "../api.php";

    class GetExercice extends Api {
        public function __construct()
        {
            $this->exec();
        }


        public function exec() {
            
            $params = array(":userID" => intval($_SESSION["newsession"]), ":exoID" => 1);
            $sql = "SELECT parentId, htmlID, wType, class, content, css FROM exercice_elements WHERE exerciceId IN (SELECT id as exerciceId FROM exercices as ex WHERE ex.userID = :userID AND ex.exoNumber = :exoID) ORDER BY id";
            $sth = self::$bdd->prepare($sql);
            $sth->execute($params);
            $result = $sth->fetchAll();


            echo json_encode($result);
            
        }

    
    }

    new GetExercice();
?>