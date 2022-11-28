<?php

require_once __DIR__ . "./connection/controleur_connection.php";
require_once __DIR__ . "./../connexion.php";

class controleur_requetes_bd extends Connexion
{

    private $module;
    private $contConnection = null;

    public function __construct(){
        Connexion::initConnexion();
        $this->module = isset($_GET['module']) ? $_GET['module'] : "null";
        $this->exec();
    }

    public function exec(){
        switch ($this->module){
            case "connection":
                $contConnection = new controleur_connection();
                break;
        }
    }

}

new controleur_requetes_bd();