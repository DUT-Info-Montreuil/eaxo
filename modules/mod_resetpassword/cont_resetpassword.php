<?php
require_once(__DIR__ . "/modele_resetpassword.php");
require_once(__DIR__ . "/vue_resetpassword.php");
require_once("composants/composant_Images/vue_Images.php");

    class ContResetPassword {
        public function __construct()
        {

            $this->m = new ModeleResetPassword($this);
            $this->v = new VueResetPassword();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "show";
            $this->exec();
        }


        public function exec() {
            switch($this->action) {
                case "show":
                    $this->v->reinitialisationMdp();
                    break;
                case "reset":
                    $this->m->verifyAndSendMail();
                    break;
                case "changepassword":
                    $this->m->checkIfCanChange();
                    break;
            }

            

        }

        public function getView() {
            return $this->v;
        }
    }
?>