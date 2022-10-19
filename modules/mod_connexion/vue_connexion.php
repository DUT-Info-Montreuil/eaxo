<?php
class VueConnexion {
    public function __construct()
    {
        
    }

    public function form_inscription() {
        echo 'Inscription';
        echo ' <form action="index.php?module=mod_connexion&action=inscription" method="POST">
            <input type="text" name="username" maxlength="20">
            <input type = "password" name = "password" maxlength="255">
            <input type = "password" name = "passwordVerify" maxlength="255">
            <input type = "text" name = "emailAdress" maxlength="100">
            <input type="submit" value="S\'inscrire">
        </form>';
        echo "<p>Déjà un compte ?</p>
        <p><a href=\"index.php?module=mod_connexion&action=form_connexion\">Connectez-vous ici.</a></p>";
    }

    public function form_connexion() {
        echo 'Connexion';
        echo ' <form action="index.php?module=mod_connexion&action=connecte" method="POST">
            <input type="text" name="login" maxlength="20">
            <input type = "password" name = "password" maxlength="255">
            <input type="submit" value="se connecter">
        </form>';
        echo "<p>Pas encore compte ?</p>
        <p><a href=\"index.php?module=mod_connexion&action=form_register\">Inscrivez-vous ici.</a></p>";
    }

    public function connected() {
        echo "vous êtes connecté";
    }
}
?>