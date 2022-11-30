<?php

require_once "./connexion.php";
class ModeleHome extends Connexion{
    public function __construct()
    {
        
    }

    public function get_pages_name($page, $folderParent) {
        $nbpage = $page * 12;
        if (is_null($folderParent)) {
            $sth = self::$bdd->prepare("SELECT name FROM exercices WHERE folderParent IS NULL AND userID =".$_SESSION['newsession']);
        }
        else {
            $sth = self::$bdd->prepare("SELECT name FROM exercices WHERE folderParent=".$folderParent." AND userID =".$_SESSION['newsession']);
        }
        $sth->execute();
        $exercicesNames = $sth->fetchAll();
        $sth = self::$bdd->prepare("SELECT f.pName FROM gallery_folders f JOIN exercices e ON f.id=e.folderParent WHERE e.userID=".$_SESSION['newsession']);
        $sth->execute();
        $folderNames = $sth->fetchAll();
        $result = array_merge($folderNames, $exercicesNames);
        return $result;
    }

    public function get_number_of_pages($folderParent) {
        if (is_null($folderParent)) {
            $sth = self::$bdd->prepare("SELECT COUNT(*) FROM exercices WHERE folderParent IS NULL AND userID =".$_SESSION['newsession']);
        }
        else {
            $sth = self::$bdd->prepare("SELECT COUNT(*) FROM exercices WHERE folderParent=".$folderParent." AND userID =".$_SESSION['newsession']);
        }
        $sth->execute();
        $result = $sth->fetch();
        
        $nbpage = intval($result[0])/12;
        return $nbpage;
    }
}
?>