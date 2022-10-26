<?php
class Connexion {
    protected static $bdd;

    public static function initConnexion() {
        $id = "dutinfopw201621";
        $dbname = "dutinfopw201621";
        $mdp = "batypyzu";
        $adress = "database-etudiants.iut.univ-paris8.fr";
        self::$bdd = new PDO("mysql:host=$adress;dbname=$dbname", $id, $mdp);
    }
}
?>