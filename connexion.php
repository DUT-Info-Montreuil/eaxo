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

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>