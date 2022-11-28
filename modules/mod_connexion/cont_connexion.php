<?php
require_once __DIR__ . "/modele_connexion.php";
require_once __DIR__ . "/vue_connexion.php";
require_once "./guardian.php";

class ContConnexion
{
    public function __construct()
    {
        $this->m = new ModeleConnexion();
        $this->v = new VueConnexion();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "form_connexion";
        $this->exec();
    }

    public function form_connexion() {
        create_token();
        $this->v->formConnexion();
    }

    public function form_inscription() {
        create_token();
        $this->vI->formInscription();
    }

    public function inscrit()
    {
        if ($this->m->form_ajout()) {
            $this->action = "form_connexion";
            $this->exec();
        } else {
            $this->action = "form_inscription";
            $this->exec();
        }
    }

    public function connexion()
    {
        if ($this->m->verif_connexion()) {
            header('Location: ./index.php');
        }
        else {
            $this->action = "form_connexion";
            $this->exec();
        }
    }

    public function deconnexion() {
        session_destroy();
        unset($_SESSION['newsession']);
        $this->action = "form_connexion";
        $this->exec();
    }

    public function connected() {
        echo "connected";
    }

    public function exec()
    {
        switch ($this->action) {
            case "form_connexion":
                $this->form_connexion();
                break;
            case "form_inscription":
                $this->form_inscription();
                break;
            case "connected":
                break;
            case "connexion":
                $this->connexion();
                break;
            case "deconnexion":
                $this->deconnexion();
                break;
            case "new_inscription":
                if ($this->m->form_ajout()) {
                    echo "tout c'est bien passer";
                    $this->action = "form_connexion";
                    $this->exec();
                } else {
                    echo "tout c'est mal passer";
                }
                break;
            case "new_inscription":
                if ($this->m->form_ajout()) {
                    echo "tout c'est bien passer";
                    $this->action = "form_connexion";
                    $this->exec();
                } else {
                    echo "tout c'est mal passer";
                }
                break;
        }
    }
}

?>