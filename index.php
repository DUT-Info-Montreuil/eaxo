<?php
    session_start();
    define('SITE_ROOT', __DIR__);
    require_once "./connexion.php";
    require_once("./vue_generique.php");
    require_once ("./controleur.php");
    
    $c = new Controleur();
    if($c->showTemplate()) {
        require_once "./template.php";
    }

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>
