<?php
require_once "./connexion.php";

class Modele extends Connexion {
    public function __construct() {
        Connexion::initConnexion();
    }  
}
?>