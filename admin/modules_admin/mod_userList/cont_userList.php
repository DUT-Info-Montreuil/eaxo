<?php
require_once __DIR__ . "/modele_userList.php";
require_once __DIR__ . "/vue_userList.php";
require_once "./guardian.php";

class ContUserList
{
    public $m;
    public $v;
    public $action;
    public function __construct()
    {
        $this->m = new ModeleUserList();
        $this->v = new VueUserList();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "usersList";
        $this->exec();
    }

    public function usersList() {
        $this->v->display($this->m->getUsersList());
    }

    public function delete_user()
    {
        $this->m->delete_user();
    }

    public function exec() {
        switch($this->action) {
            case "usersList":
                $this->usersList();
                break;
            case "delete_user":
                $this->delete_user();
                break;
        }
    }
}

?>