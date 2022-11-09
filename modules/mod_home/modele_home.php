<?php

require_once "./connexion.php";
class ModeleHome extends Connexion{
    public function __construct()
    {
        
    }

    public function get_pages_name() {
        $sth = self::$bdd->prepare('SELECT name FROM exercices');
        $sth->execute();
        $result = $sth->fetchall();
        return $result;
    }
}
?>