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
?>