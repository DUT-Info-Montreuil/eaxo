<?php
    require_once(__DIR__. "/cont_saveexo.php");

    class ModSaveExo {
        private $cont;
        public function __construct()
        {
            $this->cont = new ContSaveExo();
        }


        public function getCont()
        {
            return $this->cont;
        }
    }




?>