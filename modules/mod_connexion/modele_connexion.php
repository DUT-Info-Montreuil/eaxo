<?php

require_once "./connexion.php";
require_once "./guardian.php";
class ModeleConnexion extends Connexion{
    public function __construct()
    {

    }

    //Inserts the data (emailAdress, username and password) in the database, returns True if it worked, False otherwise
    public function ajouterUtilisateur()
    {
        if(!isset($_POST["username"]) || !isset($_POST["passwd"]) || !isset($_POST["email"]) || !token_verification()) {
            return false;
        }
        $sth = self::$bdd->prepare('INSERT INTO users (email, username, passwd) values(:email, :username, :password)');
        if ($this->verif_username($_POST['username'])) {
            
            if ($this->verif_email($_POST['email'])) {
                
                if($this->verifierMotDePasseFormAjout($_POST['passwd']) && $this->verif_email($_POST['email'])  && $this->verif_username($_POST['username']) ){
                    $sth->execute(array(':username' => $_POST['username'], ':password' => password_hash($_POST['passwd'], PASSWORD_DEFAULT), ':email' => $_POST['email']));
                    return true;
                }else{
                    return false;
                }
            }
        }
        return false;
    }

    //Vérification du mot de passe
    public function verifierMotDePasseFormAjout($var){
        if (strlen($var) >=8 && strtoupper($var) != $var && preg_replace('/[^0-9]/', '', $var) != '')
            return true;
        return false;
    }

    //Checks if the couple (username or email adress/password) exists in the database, returns True if it does, False otherwise
    public function verif_connexion() {
        if (isset($_SESSION)) {
            
            $sql = 'SELECT * FROM users WHERE (username=:login) OR (email=:login)';
            $sth = self::$bdd->prepare($sql);
            $sth->execute(array(':login' => $_POST['login']));
            $result = $sth->fetch();
            if ($result) {
                if (password_verify($_POST['password'], $result['passwd'])) {
                    $_SESSION['newsession'] = $result['id'];
                    $_SESSION["remember"] = isset($_POST["remember"]);
                    return true;
                }
            }
        }
        return false;
    }

    //Checks if the username exists in the database, returns True if it does, False otherwise
    public function verif_username($username)
    {
        $sql = 'SELECT * FROM users WHERE (username=:login)';
        $sth = self::$bdd->prepare($sql);
        $sth->execute(array(':login' => $username));
        $tab = $sth->fetch();
        if($tab)
            return false;
        return true;
    }

    //Checks if the email adress exists in the database, returns True if it does, False otherwise
    public function verif_email($email)
    {
        $sql = 'SELECT * FROM users WHERE (email=:email)';
        $sth = self::$bdd->prepare($sql);
        $sth->execute(array(':email' => $email));
        $tab = $sth->fetch();
        if($tab)
            return false;
        return true;
    }


}
/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>