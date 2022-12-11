<?php
require_once "./dossier/controleur_dossier.php";
require_once "./dossier/requette_recupperer_dossier.php";
require_once "./dossier/requette_ajouter_dossier.php";


class controleur_dossier extends Connexion
{
    private $action;

    public function __construct(){
        $this->action = isset($_GET['action']) ? $_GET['action'] : "null";
        $this->exec();
    }

    public function exec(){
        switch ($this->action){
            case "getArchitecture":
                recupererArchitecture(Connexion::$bdd, $_SESSION['newsession']);
                break;
            case "addFolder":
                if(isset($_SESSION['newsession']) && isset($_POST['pName']) && isset($_POST['folderParent']))
                    ajouterDossier(Connexion::$bdd, $_SESSION['newsession'], $_POST['pName'], $_POST['folderParent']);
                break;

        }
    }
}

