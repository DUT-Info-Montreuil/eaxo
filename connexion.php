<?php

class Connexion
{
    protected static $bdd;

    public static function initConnexion()
    {
        $id = "root";
        $dbname = "";
        $mdp = "Ct%#j$2%7r%B#N6sXW6PyFx28R^94FyC5n7P!CcdB6^!5c3R*QteBj4w2Em^h7q*";
        $adress = "176.182.193.31:3306";
        self::$bdd = new PDO("mysql:host=$adress;dbname=$dbname", $id, $mdp);
    }

}

?>