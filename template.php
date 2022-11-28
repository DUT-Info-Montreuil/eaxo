<!DOCTYPE html>
<html lang="fr">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="./style.css">

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="./style.css">
        
        
        <link rel="icon" type="image/png" href="sources/Images/logo.jpg" />
        <base href="<?php __DIR__ ?>"> 
    </head>


    <body>
        <?php
            
            require_once "./composants/composant_navbar/composant_navbar.php";
            $nb = new ComposantNavBar();
            
            $nb->affichage();
            echo $c->result;
            
            
        ?>


        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--!-->
    
    </body>
</html>