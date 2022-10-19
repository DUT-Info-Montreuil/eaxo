<?php
class Connexion {
    protected static $bdd;

    public static function initConnexion() {
        $id = "id";
        $dbname = "dbname";
        $mdp = "mdp";
        $adress = "adress";
        self::$bdd = new PDO("mysql:host=$adress;dbname=$dbname", $id, $mdp);
    }

}
?>