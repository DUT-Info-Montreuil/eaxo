<?php

require_once __DIR__ . "/requete_utilisateur_existe.php";
require_once __DIR__ . "/requete_utilisateur_mail_existe.php";
require_once __DIR__ . "/../../connexion.php";

class controleur_connection extends Connexion
{
    private $action;
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
            case "verifMailExiste":
                if(isset($_POST["mail"]))
                    verifMailExiste(Connexion::$bdd, $_POST["mail"]);
                break;
        }
    }
}

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/