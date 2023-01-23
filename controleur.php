<?php

class Controleur
{
    private $module;
    private $m;
    private $mod;
    public $result;

    public function __construct() {
        require_once ("modele.php");

        $this->m = new Modele();
        $this->module = isset($_GET['module']) ? $_GET['module'] : "mod_home";
        $this->exec();


    }

    public function groupUser() {
        return $this->m->userGroup();
    }

    public function exec()
    {
        if (!isset($_SESSION["newsession"]) && $this->module != "mod_resetpassword") {
            $this->module = "mod_connexion";
        }
        switch ($this->module) {
            case "mod_connexion":
                require_once "./modules/mod_connexion/mod_connexion.php";
                $this->mod = new ModConnexion();
                break;
            case "mod_pages":
                require_once "./modules/mod_pages/mod_pages.php";
                $this->mod = new ModPages();
                break;
            case "mod_home":
                if ($this->groupUser() == 2) {
                    require_once "./admin/modules_admin/mod_userList/mod_userList.php"; // pour les Faille include 
                    $this->mod = new ModUserList();
                } else {
                    require_once "./modules/mod_home/mod_home.php";
                    $this->mod = new ModHome();
                }
                break;
            case "mod_resetpassword":
                require_once "./modules/mod_resetpassword/mod_resetpassword.php";

                $this->mod = new ModResetPassword();
                break;

        }

        $this->result = $this->mod->getCont()->v->getAffichage();
    }

    public function showTemplate() {
        return $this->module != "mod_saveexo";
    }
}

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>