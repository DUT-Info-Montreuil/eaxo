<?php
require_once __DIR__ . "/vue_navbar.php";

class ContNavbarAdmin {
    private $v;
    public function __construct()
    {
        $this->v = new VueNavbarAdmin();
    }

    public function exec() {
        $this->v->vueNavbar();
    }
}
/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>