<?php
class Connexion {
    protected static $bdd;

    public static function initConnexion() {
        $id = "eaxo";
        $dbname = "eaxo";
        $mdp = "eaxo";
        $adress = "localhost";
        self::$bdd = new PDO("mysql:host=$adress;dbname=$dbname", $id, $mdp);
    }

}
?>