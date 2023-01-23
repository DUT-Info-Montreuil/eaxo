<?php
require_once(__DIR__ . "/modele_resetpassword.php");
require_once(__DIR__ . "/vue_resetpassword.php");
require_once("composants/composant_Images/vue_Images.php");
require_once "./guardian.php";

    class ContResetPassword {
        private $m;
        private $v;
        private $action;
        
        public function __construct()
        {

            $this->m = new ModeleResetPassword($this);
            $this->v = new VueResetPassword();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "show";
            $this->exec();
            create_token();
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

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>