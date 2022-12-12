<?php

require_once __DIR__ . "/cont_navbar.php";
class ComposantNavBarAdmin {
    private $cont;

    public function __construct() {
        $this->cont = new ContNavbarAdmin();
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