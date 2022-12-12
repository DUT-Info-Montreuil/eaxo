<?php
require_once __DIR__ . "/vue_navbar.php";

class ContNavbar {
    public function __construct()
    {
        $this->v = new VueNavbar();
    }

    public function exec() {
        $this->v->vueNavbar();
    }

    public function getVue() {
        return $this->v;
    }
}
?>