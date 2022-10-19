<?php
    session_start();
    define('SITE_ROOT', __DIR__);
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
                    <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                    <li><a href="#" class="nav-link px-2 text-secondary">A propos de nous :)</a></li>
                </ul>

                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2">Login</button>
                    <button type="button" class="btn btn-warning">Sign-up</button>
                </div>
            </div>
        </div>
    </header>
    
    <!-- fin de nav bar -->

    

    <div id="Div_Connection" class="text-center">
        <main class="form-signin w-100 m-auto">
            <form>
                <img class="mb-4" src="sources/Images/logo.jpg" alt="" width="100" height="100">
                <h1 class="h3 mb-3 fw-normal">Please Log in</h1>
    
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
    
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button id="bouton_send" class="w-100 btn btn-lg btn-warning" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>
            </form>
        </main>
    </div>
    

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>