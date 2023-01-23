<?php
require_once "./dossier/controleur_dossier.php";
require_once "./dossier/requete_recupperer_dossier.php";
require_once "./dossier/requete_ajouter_dossier.php";
require_once "./dossier/requete_supprimer_dossier.php";
require_once "./dossier/requete_renomer_dossier.php";


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
                    renommerDossier(Connexion::$bdd, $_SESSION['newsession'], $_POST['nom'], $_POST['id']);
                break;
        }
    }
}

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/