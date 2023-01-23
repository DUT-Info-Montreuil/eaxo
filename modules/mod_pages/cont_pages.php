<?php
require_once(__DIR__ . "/modele_pages.php");
require_once(__DIR__ . "/vue_pages.php");
require_once("composants/composant_Images/vue_Images.php");

    class ContPages {
        private $m;
        private $v;
        private $action;
        private $saveExercice;
        public function __construct()
        {

            $this->m = new ModelePages($this);
            $this->v = new VuePages();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "formEdit";
            $this->exec();
        }


        public function exec() {

            switch($this->action) {
                case "formEdit":
                    
                    //echo($data);
                    $this->m->fetchExercice();
                    //$this->v->formEdit();
                    break;
                case "save":
                    $this->saveExercice->save();
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