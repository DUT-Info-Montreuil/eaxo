<?php
class ModeleConnexion {
    public function __construct()
    {
        
    }

    public function form_ajout() {
        $sth = self::$bdd->prepare('INSERT INTO accounts values(NULL, :username, :password, :email)');
        if (!$this->verif_login($_POST['login'])) {
            $sth->execute(array(':login'=>$_POST['username'], ':mdp'=>password_hash($_POST['passwd'], PASSWORD_DEFAULT), ':email'=>$_POST['email']));
            return true;
        }
        return false;
    }

    public function verif_connexion() {
        if (isset($_SESSION)) {
            $sql = 'SELECT * FROM accounts WHERE (username=:login) OR (email=:login)';
            $sth = self::$bdd->prepare($sql);
            $sth->execute(array(':login'=>$_POST['login']));
            $result = $sth->fetch();
            if ($result) {
                if (password_verify($_POST['passwd'], $result['passwd'])) {
                    $_SESSION['newsession'] = $result['email'];
                    return true;
                }
            }
        }
        return false;
    }
}
?>