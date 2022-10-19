<?php
class Connexion {
    protected static $bdd;

    public static function initConnexion() {
        $id = "dutinfopw201617";
        $dbname = "dutinfopw201617";
        $mdp = "guzuduqy";
        $adress = "database-etudiants.iut.univ-paris8.fr";
        self::$bdd = new PDO("mysql:host=$adress;dbname=$dbname", $id, $mdp);
    }

}
?>