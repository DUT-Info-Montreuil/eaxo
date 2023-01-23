<?php
require_once "./connexion.php";

class Modele extends Connexion {
    public function __construct() {
        Connexion::initConnexion();
    }  

    public function userGroup() {
        $usergrp = 1;
        if (isset($_SESSION["newsession"])) {
            $sth = self::$bdd->prepare("SELECT groupid FROM users WHERE id=?");
            $sth->execute(array($_SESSION["newsession"]));
            $usergrp = $sth->fetch()['groupid'];
        }
        return $usergrp;
    }
}
/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>