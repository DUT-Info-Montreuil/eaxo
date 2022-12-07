<?php

require_once "./connexion.php";
class ModeleHome extends Connexion{
    public function __construct()
    {

    }

    public function get_pages_name($page, $folderParent) {
        $limit = $page*12;
        $offset = $limit - 12;
        if (is_null($folderParent)) {
            $sth = self::$bdd->prepare("SELECT name, exoNumber FROM exercices WHERE folderParent IS NULL AND userID =".$_SESSION['newsession']. " LIMIT ".$offset.",".$limit);
        }
        else {
            $sth = self::$bdd->prepare("SELECT name, exoNumber FROM exercices WHERE folderParent=".$folderParent." AND userID =".$_SESSION['newsession']. " LIMIT ".$offset.",".$limit);
        }
        $sth->execute();
        $exercicesNames = $sth->fetchAll();
        $sth = self::$bdd->prepare("SELECT f.pName FROM gallery_folders f JOIN exercices e ON f.id=e.folderParent WHERE e.userID=".$_SESSION['newsession']. " LIMIT ".$offset.",".$limit);
        $sth->execute();
        $folderNames = $sth->fetchAll();
        $result = array_merge($folderNames, $exercicesNames);
        return $result;
    }

    public function get_number_of_pages($folderParent) {
        if (is_null($folderParent)) {
            $sth = self::$bdd->prepare("SELECT COUNT(*) FROM exercices WHERE folderParent IS NULL AND userID =".$_SESSION['newsession']);
            $sth2 = self::$bdd->prepare("SELECT COUNT(*) FROM exercices WHERE folderParent IS NULL AND userID =".$_SESSION['newsession']);
        }
        else {
            $sth = self::$bdd->prepare("SELECT COUNT(*) FROM exercices WHERE folderParent=".$folderParent." AND userID =".$_SESSION['newsession']);
        }
        $sth->execute();
        $result = $sth->fetch();
        
        $nbpage = intval($result[0])/12+1;
        return $nbpage;
    }

    public function create_exercice() {
        if (strlen($_POST['exerciceName']) > 0) {
            $sth = self::$bdd->prepare("INSERT INTO exercices (userID, name, exoNumber) VALUES(?, ?, ?)");
            if ($sth->execute(array($_SESSION['newsession'], $_POST['exerciceName'], rand(1,10000)))) {
                return True;
            }
        }
        return false;
    }

    public function delete_exercice() {
        $sth = self::$bdd->prepare("DELETE FROM exercices WHERE exoNumber=?");
        $sth->execute(array($_POST['exoNumber']));
    }
}
?>