<?php

require_once __DIR__ . "/cont_home.php";
class ModHome {
    private $cont;

    public function __construct() {
        $this->cont = new ContHome();
    }

    public function getCont()
    {
        return $this->cont;
    }
}
/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>