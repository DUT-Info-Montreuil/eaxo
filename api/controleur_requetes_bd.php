<?php
session_start();
require_once __DIR__ . "/connection/controleur_connection.php";
require_once __DIR__ . "/images/controleur_images.php";
require_once __DIR__ . "/dossier/controleur_dossier.php";
require_once __DIR__ . "/../connexion.php";

class controleur_requetes_bd extends Connexion
{

    private $module;
    private $contConnection = null;
    private $contImages = null;
    private $contDossier = null;

    public function __construct(){
        Connexion::initConnexion();
        $this->module = isset($_GET['module']) ? $_GET['module'] : "null";
        $this->exec();
    }

    public function exec(){
        switch ($this->module){
            case "connection":
                $this->contConnection = new controleur_connection();
                break;
            case "dossiers":
                $this->contDossier = new controleur_dossier();
                break;
            case "images":
                $this->contImages = new controleur_images();
                break;
        }
    }

}

new controleur_requetes_bd();