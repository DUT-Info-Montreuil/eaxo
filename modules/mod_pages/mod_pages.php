<?php

require_once __DIR__ . "/cont_pages.php";
class ModPages {
    private $cont;

    public function __construct() {
        $this->cont = new ContPages();
    }

    public function getCont()
    {
        return $this->cont;
    }
}
?>