<?php
class Connexion {
    protected static $bdd;

    public static function initConnexion() {
        $id = "";
        $dbname = "eaxo";
        $mdp = "";
        $adress = "";
        self::$bdd = new PDO("mysql:host=$adress;dbname=$dbname", $id, $mdp);
    }

}
?>