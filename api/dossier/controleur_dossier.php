<?php
require_once "./dossier/controleur_dossier.php";
require_once "./dossier/requette_recupperer_dossier.php";
require_once "./dossier/requette_ajouter_dossier.php";
require_once "./dossier/requette_supprimer_dossier.php";
require_once "./dossier/requette_renomer_dossier.php";


class controleur_dossier extends Connexion
{
    private $action;

    public function __construct(){
        $this->action = isset($_GET['action']) ? $_GET['action'] : "null";
        if(isset($_SESSION['newsession']))
            $this->exec();
    }

    public function exec(){
        switch ($this->action){
            case "getArchitecture":
                recupererArchitecture(Connexion::$bdd, $_SESSION['newsession']);
                break;
            case "addFolder":
                if(isset($_POST['pName']) && isset($_POST['folderParent']))
                    ajouterDossier(Connexion::$bdd, $_SESSION['newsession'], $_POST['pName'], $_POST['folderParent']);
                break;
            case "delFolder":
                if(isset($_POST['id']))
                    supprimerDossier(Connexion::$bdd, $_SESSION['newsession'], $_POST['id']);
                break;
            case "rename":
                if(isset($_POST['nom']) && isset($_POST['id']))
                    renomerDossier(Connexion::$bdd, $_SESSION['newsession'], $_POST['nom'], $_POST['id']);
                break;
        }
    }
}

