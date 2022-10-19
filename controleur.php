<?php
class Controleur {
    private $module;

    public function __construct() {
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