<?php
require_once __DIR__ . "/vue_navbar.php";

class ContNavbarAdmin {
    public function __construct()
    {
        $this->v = new VueNavbarAdmin();
    }

    public function exec() {
        $this->v->vueNavbar();
    }
}
?>