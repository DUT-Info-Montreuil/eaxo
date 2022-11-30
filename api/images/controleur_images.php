<?php
require_once "./images/controleur_images.php";
require_once "./images/requette_recupperer_images.php";

class controleur_images extends Connexion
{
    private $action;

    public function __construct(){
        $this->action = isset($_GET['action']) ? $_GET['action'] : "null";
        $this->exec();
    }

    public function exec(){
        switch ($this->action){
            case "images":
                recupererArchitectureIMG(Connexion::$bdd, $_SESSION['newsession']);
                break;

        }
    }
}