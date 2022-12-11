<?php
require_once "./images/controleur_images.php";
require_once "./images/requette_recupperer_images.php";
require_once "./images/requette_ajouter_image.php";

class controleur_images extends Connexion
{
    private $action;

    public function __construct(){
        $this->action = isset($_GET['action']) ? $_GET['action'] : "null";
        $this->exec();
    }

    public function exec(){
        switch ($this->action){
            case "getImages":
                if(isset($_SESSION['newsession']) && isset($_POST['folderParent']))
                    recupererArchitectureIMG(Connexion::$bdd, $_SESSION['newsession'], $_POST['folderParent']);
                break;
            case "addImage":
                if(isset($_SESSION['newsession']) && isset($_POST['pName']) && isset($_POST['folderParent']) && isset($_POST['Img64']))
                    ajouterImage(Connexion::$bdd, $_SESSION['newsession'], $_POST['Img64'], $_POST['pName'], $_POST['folderParent']);
                break;
        }
    }
}