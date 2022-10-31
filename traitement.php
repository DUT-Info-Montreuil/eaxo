<?php
    session_start();
    if(isset($_SESSION["newsession"])) {
        $value = $_POST["exoJson"];
        echo $_SESSION["newsession"];
    } else {
        echo "erreur";
    }
    
    
?>