<?php
    require_once __DIR__ . "/modele_saveexo.php";
    require_once __DIR__ . "/vue_saveexo.php";

    class ContSaveExo {
        
        //private $action;

        public function __construct()
        {
            //$this->action = $_POST[""];
            $this->m = new ModeleSaveExo();
            $this->v = new VueSaveExo();

           
        }

        public function exec() {

        }
    }
?>