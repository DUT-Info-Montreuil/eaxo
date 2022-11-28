<?php

require_once __DIR__ . "/requette_utilisateur_existe.php";
require_once __DIR__ . "/../connexion.php";

class controleur_connection extends Connexion
{

    public function __construct(){
        $this->action = isset($_GET['action']) ? $_GET['action'] : "null";
        $this->exec();
    }

    public function exec(){
        switch ($this->action){
            case "verifUtilisateurExiste":
                if (isset($_POST["username"]))
                    verifUtilisateurExiste(Connexion::$bdd, $_POST["username"]);
                break;
        }
    }
}