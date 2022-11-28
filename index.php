<?php
    session_start();
    define('SITE_ROOT', __DIR__);
    require_once "./connexion.php";
    require_once("./vue_generique.php");
    require_once ("controleur.php");
    
    $c = new Controleur();
    if($c->showTemplate()) {
        require_once "./template.php";
    }
?>
