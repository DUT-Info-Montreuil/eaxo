<?php

require_once __DIR__ . "/cont_navbar.php";
class ComposantNavBar {
    private $cont;

    public function __construct() {
        $this->cont = new ContNavbar();
    }

    public function affichage() {
        $this->cont->exec();
    }

    public function getCont()
    {
        return $this->cont;
    }
}
?>