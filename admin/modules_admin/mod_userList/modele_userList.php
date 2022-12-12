<?php

require_once "./connexion.php";
class ModeleUserList extends Connexion{
    public function __construct()
    {

    }

    public function getUsersList() {
        $sth = self::$bdd->prepare("SELECT username, id FROM users WHERE groupid=1");
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }
    
    public function delete_user() {
        $sth = self::$bdd->prepare("DELETE FROM users WHERE id=?");
        $sth->execute(array($_POST['userId']));
    }
}
?>