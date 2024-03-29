<?php
require_once __DIR__ . "/modele_home.php";
require_once __DIR__ . "/vue_home.php";

class ContHome {
    public $m;
    public $v;
    public $action;
    public $location;
    public $page;
    public function __construct()
    {
        $this->m = new ModeleHome();
        $this->v = new VueHome();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "homepage";
        $this->location = isset($_GET['location']) ? $_GET['location'] : null;
        $this->page = isset($_GET['page']) ? $_GET['page'] : '1';
        $this->exec();
    }

    public function homepage() {
        $this->v->homepage($this->m->get_pages_name(intval($this->page), $this->location), $this->m->get_number_of_pages($this->location), intval($this->page));
    }

    public function create_exercice() {
        $this->m->create_exercice();
        header("Location: ./index.php?module=mod_home&action=homepage");
    }

    public function delete_exercice() {
        $this->m->delete_exercice();
        header("Location: ./index.php?module=mod_home&action=homepage");
    }
    
    public function exec() {
        switch($this->action) {
            case "homepage":
                $this->homepage();
                break;
            case "create_exercice":
                $this->create_exercice();
                break;
            case "delete_exercice":
                $this->delete_exercice();
                break;
        }
    }
}
/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>