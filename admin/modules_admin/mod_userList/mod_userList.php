<?php

require_once __DIR__ . "/cont_userList.php";
class ModUserList {
    private $cont;

    public function __construct() {
        $this->cont = new ContUserList();
    }

    public function getCont()
    {
        return $this->cont;
    }
}
?>