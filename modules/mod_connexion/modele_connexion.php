<?php

require_once "./connexion.php";
class ModeleConnexion extends Connexion{
    public function __construct()
    {
        
    }

    //Inserts the data (emailAdress, username and password) in the database, returns True if it worked, False otherwise
    public function form_ajout() {
        $sth = self::$bdd->prepare('INSERT INTO accounts values(NULL, :username, :password, :email)');
        if (!$this->verif_username($_POST['username'])) {
            if (!$this->verif_email($_POST['emailAdress'])) {
                $sth->execute(array(':login'=>$_POST['username'], ':mdp'=>password_hash($_POST['passwd'], PASSWORD_DEFAULT), ':email'=>$_POST['email']));
                return true;
            }
        }
        return false;
    }

    //Checks if the couple (username or email adress/password) exists in the database, returns True if it does, False otherwise
    public function verif_connexion() {
        if (isset($_SESSION)) {
            $sql = 'SELECT * FROM users WHERE (username=:login) OR (email=:login)';
            $sth = self::$bdd->prepare($sql);
            $sth->execute(array(':login'=>$_POST['login']));
            $result = $sth->fetch();
            if ($result) {
                if (password_verify($_POST['password'], $result['passwd'])) {
                    $_SESSION['newsession'] = $result['id'];
                    return true;
                }
            }
        }
        return false;
    }

    //Checks if the username exists in the database, returns True if it does, False otherwise
    public function verif_username($username) {
        $sql = 'SELECT * FROM users WHERE (username=:login)';
        $sth = self::$bdd->prepare($sql);
        $sth->execute(array(':login'=>$username));
        $tab = $sth->fetch();
        return $tab;
    }

    //Checks if the email adress exists in the database, returns True if it does, False otherwise
    public function verif_email($email) {
        $sql = 'SELECT * FROM users WHERE (email=:email)';
        $sth = self::$bdd->prepare($sql);
        $sth->execute(array(':email'=>$email));
        $tab = $sth->fetch();
        return $tab;
    }
}
?>