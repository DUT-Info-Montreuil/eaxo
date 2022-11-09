<?php

require_once __DIR__ . "/cont_home.php";
class ModHome {
    private $cont;

    public function __construct() {
        $this->cont = new ContHome();
        //$this->cont->exec();
    }

    public function getCont()
    {
        return $this->cont;
    }
}
?>