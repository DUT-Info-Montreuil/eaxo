<?php

require_once "./connexion.php";
class ModeleUserList extends Connexion{
    public function __construct()
    {

    }

    public function getUsersList() {
        $sth = self::$bdd->prepare("SELECT u.username as username, u.id as id, COUNT(e.userID) as nbExo FROM users u JOIN exercices e ON u.id = e.userID WHERE u.groupid=1 GROUP BY e.userID");
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }
    
    public function delete_user() {
        $sth = self::$bdd->prepare("DELETE FROM users WHERE id=?");
        $sth->execute(array($_POST['userId']));
    }
}
/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>