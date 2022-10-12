<?php
class ModConnexion {
    private $cont;

    public function __construct() {
        $this->cont = new ContConnexion();
        $this->cont->exec();
    }
}
?>