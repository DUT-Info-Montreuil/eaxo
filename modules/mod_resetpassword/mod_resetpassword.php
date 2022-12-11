<?php

require_once __DIR__ . "/cont_resetpassword.php";
class ModResetPassword {
    private $cont;

    public function __construct() {
        $this->cont = new ContResetPassword();
    }

    public function getCont()
    {
        return $this->cont;
    }
}
?>