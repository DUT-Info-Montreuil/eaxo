<?php

require_once "./connexion.php";
class ModeleHome extends Connexion{
    public function __construct()
    {
        
    }

    public function get_pages_name($page) {
        $nbpage = $page * 12;
        $sth = self::$bdd->prepare("SELECT top $nbpage name FROM exercices");
        $sth->execute();
        $result = $sth->fetchall();
        return $result;
    }

    public function get_number_of_pages() {
        $sth = self::$bdd->prepare("SELECT count(*) FROM exercices");
        $sth->execute();
        $result = $sth->fetch();
        
        $nbpage = intval($result[0])/12;
        return $nbpage;
    }
}
?>