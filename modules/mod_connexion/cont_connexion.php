<?php
class ContConnexion {
    public function __construct()
    {
        $this->v = new VueConnexion();
        $this->m = new ModeleConnexion();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "form_connexion";
    }

    public function form_connexion() {
        $this->v->form_connexion();
    }

    public function form_inscription() {
        $this->v->form_inscription();
    }

    public function inscrit() {
        if ($this->m->form_ajout()) {
            $this->action = "form_connexion";
            $this->exec();
        }
        else {
            $this->action = "form_inscription";
            $this->exec();
        }
    }

    public function connexion() {
        if ($this->m->verif_connexion()) {
            $this->action = "connected";
            $this->exec();
        }
        else {
            $this->action = "form_connexion";
            $this->v->erreur_connexion();
            $this->exec();
        }
    }

    public function connected() {
        $this->v->connected();
    }

    public function exec() {
        switch($this->action) {
            case "form_connexion":
                $this->form_connexion();
                break;
            case "form_register":
                $this->form_inscription();
                break;
            case "connected":
                $this->connected();
                break;
        }
    }
}
?>