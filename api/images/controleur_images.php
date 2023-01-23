<?php
require_once "./images/controleur_images.php";
require_once "./images/requete_recupperer_images.php";
require_once "./images/requete_ajouter_image.php";
require_once "./images/requete_supprimer_image.php";
require_once "./images/requete_renomer_image.php";


class controleur_images extends Connexion
{
    private $action;

    public function __construct(){
        $this->action = isset($_GET['action']) ? $_GET['action'] : "null";
        if(isset($_SESSION['newsession']))
            $this->exec();
    }

    public function exec(){
        switch ($this->action){
            case "getImages":
                if(isset($_POST['folderParent']))
                    recupererArchitectureIMG(Connexion::$bdd, $_SESSION['newsession'], $_POST['folderParent']);
                break;
            case "addImage":
                if(isset($_POST['pName']) && isset($_POST['folderParent']) && isset($_POST['Img64']))
                    ajouterImage(Connexion::$bdd, $_SESSION['newsession'], $_POST['Img64'], $_POST['pName'], $_POST['folderParent']);
                break;
            case "delImage":
                if(isset($_POST['id']))
                    supprimerIMG(Connexion::$bdd, $_SESSION['newsession'],$_POST['id']);
                break;
            case "rename":
                if(isset($_POST['nom']) && isset($_POST['id']))
                    renommerImage(Connexion::$bdd, $_SESSION['newsession'], $_POST['nom'], $_POST['id']);
                break;
            case "getImage":
                require_once __DIR__ ."/getImage.php";
                getImage(Connexion::$bdd);
                break;
            
        }
    }
/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
}