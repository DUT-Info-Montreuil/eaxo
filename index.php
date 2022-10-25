<?php
    session_start();
    define('SITE_ROOT', __DIR__);
    require_once "./connexion.php";
?>
<!DOCTYPE html>
<html lang="fr">

<!-- En tête de la page -->
<head>
    <meta charset="UTF-8">
    
    <!-- Onglet mise en forme-->

    <!--Pour l'image de l'onglet la taille est de 16*16-->
    <link rel="icon" type="image/png" href="sources/Images/logo.jpg" />

    <!-- Ajout des Fichiers CSS-->
    
    <!-- BootStrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="index.css" rel="stylesheet">
    
    <!--Titre de l'onglet-->
    <title>Menu | Eaxo</title>
</head>


<body>
    <!-- nav bar -->
    <header class="p-3 text bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-white">Accueil</a></li>
                    <li><a href="https://github.com/DUT-Info-Montreuil/eaxo" class="nav-link px-2 text-white">Documentation</a></li>
                    <li><a href="https://github.com/DUT-Info-Montreuil" class="nav-link px-2 text-secondary">A propos de nous :)</a></li>
                </ul>
                <div class="text-end">
                <?php
                    if (!isset($_SESSION['newsession'])) {
                        
                ?>
                    <button type="button" class="btn btn-outline-light me-2">Connexion</button>
                    <button type="button" class="btn btn-warning">Creer un compte</button>
                    <?php
                    }
                    else {
                ?>
                 <button type="button" class="btn btn-warning">Deconnexion</button>
                 <?php
                    }
                ?>
                </div>
              
            </div>
        </div>
    </header>

    <?php require_once ("controleur.php");
    new Controleur(); ?>
    
    <!-- fin de nav bar -->

    

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>