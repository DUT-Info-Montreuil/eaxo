<?php
    require_once SITE_ROOT ."/connexion.php";
    require_once __DIR__ ."/cont_resetpassword.php";
    require_once SITE_ROOT ."/config.php";
    
    class ModeleResetPassword extends Connexion {
        
        public function __construct($cont)
        {
            $this->con = $cont;
        }

        //Vérification du mot de passe
        public function verifierMotDePasseFormAjout($var){
            if (strlen($var) >=8 && strtoupper($var) != $var && preg_replace('/[^0-9]/', '', $var) != '')
                return true;
            return false;
        }


        public function getDomainName() {
            $url = "";
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                $url = "https://";
            else
                $url = "http://";

            return $url.$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], "&action="));
        }

        public function sendResetPassword($email, $name, $link) {
            global $websiteSupportMail;
            $from = $websiteSupportMail;

            $subject = "Réinitialisation mot de passe Eaxo";
            $message = "Lien de réinitilisation : ".$this->getDomainName()."&action=changepassword&value=$link";
            $headers = "De :". $from;
            mail($email, $subject, $message, $headers);
            $this->con->getView()->emailEnvoye();
        }


        public function verifyAndSendMail() {
            try {
                if(isset($_POST["login"])) {
                    $sql = 'SELECT email, username, id FROM users WHERE (username=:login) OR (email=:login)';
                    $sth = self::$bdd->prepare($sql);
                    $sth->execute(array(':login' => $_POST['login']));
                    $result = $sth->fetch();
                    
                    if ($result) {
                        $datetime = new DateTime(date('Y-m-d H:i:s'));
                        $date = date_add($datetime, new DateInterval('PT1H15M0S'))->format('Y-m-d H:i:s');
                        
                        $str = $result["id"].$result["email"].rand(0, 6000);
                        $link = hash("sha3-256", $str);

                        $sql = "INSERT INTO reset_password (userid, link, expire) VALUES (:userid, :link, :date)";
                        $sth = self::$bdd->prepare($sql);
                        $sth->execute(array(":userid" => $result['id'], ":link" => $link, ":date"=>$date));
                        $this->sendResetPassword($result['email'], $result['username'], $link);
                    }
                }
            } catch (Exception $ex) {
                echo "Une erreur s'est produite, veuillez contacter un administrateur";
            }
        }

        public function checkIfCanChange() {
            try {
                if(isset($_GET["value"])) {
                    $sql = "SELECT userid, expire FROM reset_password WHERE (link=:link AND expire >= :now)";
                    $sth = self::$bdd->prepare($sql);
                    $sth->execute(array(":link" => $_GET["value"], ":now" => date('Y-m-d H:i:s')));

                    $result = $sth->fetch();
                    if($result) {
                        if(isset($_POST["password"]) && $this->verifierMotDePasseFormAjout($_POST["password"])) {
                            $hashpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                            $sql = "UPDATE users SET passwd = :passwd WHERE id = :userid";
                            $sth = self::$bdd->prepare($sql);
                            $sth->execute(array(":userid" => $result["userid"], ":passwd" => $hashpassword));
                            

                            //Delete link
                            $sql = "DELETE FROM reset_password WHERE (userid=:uid)";
                            $sth = self::$bdd->prepare($sql);
                            $sth->execute(array(":uid" => $result["userid"]));
                            echo "Le mot de passe a été changé, vous pouvez vous connecter";

                        } else {
                            $this->con->getView()->changerMdp($_GET["value"]);
                        }
                    } else {
                        echo "lien expiré";
                    }
                }
            } catch (Exception $ex) {
                echo "Une erreur s'est produite, veuillez contacter un administrateur";
            }
        }

       
        



    }
?>