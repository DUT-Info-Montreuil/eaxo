<?php
class Controleur {
    private $module;
    private $m;

    public function __construct() {
        require_once ("modele.php");
        $this->m = new Modele();
        $this->module = isset($_GET['module']) ? $_GET['module'] : "mod_connexion";
        $this->exec();
    }

    public function exec() {
        switch($this->module) {
            case "mod_connexion":
                require_once "./modules/mod_connexion/mod_connexion.php";
                $c = new ModConnexion();
                break;
            case "deconnexion":
                session_destroy();
                unset($_SESSION["newsession"]);
                echo "Deconnecté";

        }
    }
}
?>