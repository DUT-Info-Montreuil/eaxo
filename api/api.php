<?php
    session_start();
    //define("API_ROOT",__DIR__);
    require_once "../../connexion.php";

    //header("Content-Type : application/json; charset=utf-8");
    class Api extends Connexion {
        private $path;
        private $endpoint;
        public function __construct()
        {
            
            self::initConnexion();
        }


        public function getConnected() {
            return isset($_SESSION["newsession"]) ? $_SESSION["newsession"] : false;
        }
    }

    new Api();
/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>