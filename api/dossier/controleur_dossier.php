<?php
require_once "./dossier/controleur_dossier.php";
require_once "./dossier/requette_recupperer_dossier.php";


class controleur_dossier extends Connexion
{
    private $action;

    public function __construct(){
        $this->action = isset($_GET['action']) ? $_GET['action'] : "null";
        $this->exec();
    }

    public function exec(){
        switch ($this->action){
            case "architecture":
                recupererArchitecture(Connexion::$bdd, $_SESSION['newsession']);
                break;

        }
    }
}

