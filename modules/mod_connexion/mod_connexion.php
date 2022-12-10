<?php

require_once __DIR__ . "/cont_connexion.php";
class ModConnexion {
    private $cont;

    public function __construct() {
        $this->cont = new ContConnexion();
    }

    public function getCont()
    {
        return $this->cont;
    }
}
?>