<?php
    require_once SITE_ROOT ."/connexion.php";
    require_once __DIR__ ."/cont_pages.php";
    
    class ModelePages extends Connexion {
        private $con;
        
        public function __construct($cont)
        {
            $this->con = $cont;
        }

        public function fetchExercice() {
            $_SESSION["exoID"] = intval($_GET["exo"]);
            
            $this->con->getView()->formEdit();
            
            
        }
    }
/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>