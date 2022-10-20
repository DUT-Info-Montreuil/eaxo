<?php
    session_start();
    define('SITE_ROOT', __DIR__);
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./style.css">
        <title>EAXO</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    </head>


    <body>
        <header>

        </header>

        <main class="container">
        <div class="row">
            <div class="widgets col-3 displaynone">
                <?php require_once(__DIR__ . "/widgets_list.php") ?>
            </div>

            
        </div>

        <div class="apercu col-sm-9">
                <page id="pageContainer" size="A4">
                </page>
                
            </div>
    </main>

        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    </body>
</html>
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
                    <button type="button" class="btn btn-outline-light me-2">Connexion</button>
                    <button type="button" class="btn btn-warning">Creer un compte</button>
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