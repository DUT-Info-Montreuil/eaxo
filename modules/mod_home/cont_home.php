<?php
require_once __DIR__ . "/modele_home.php";
require_once __DIR__ . "/vue_home.php";

class ContHome {
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
    
    public function exec() {
        switch($this->action) {
            case "homepage":
                $this->homepage();
                break;
        }
    }
}
?>