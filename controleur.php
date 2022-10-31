<?php
class Controleur {
    private $module;
    private $m;
    private $mod;
    public $result;

    public function __construct() {
        require_once ("modele.php");

        $this->m = new Modele();
        $this->module = isset($_GET['module']) ? $_GET['module'] : "mod_connexion";
        $this->exec();
    }

    public function exec() {
        if(!isset($_SESSION["newsession"])) {
            $this->module = "mod_connexion";
        }
        switch($this->module) {
            case "mod_connexion":
                require_once "./modules/mod_connexion/mod_connexion.php";
                $this->mod = new ModConnexion();
                break;
            case "deconnexion":
                session_destroy();
                unset($_SESSION["newsession"]);
                echo "Deconnecté";
                break;
            case "mod_pages":
                require_once "./modules/mod_pages/mod_pages.php";
                $this->mod = new ModPages();
                break;

        }

        $this->result = $this->mod->getCont()->v->getAffichage();
    }
}
?>