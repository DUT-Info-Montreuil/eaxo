<?php
    require_once SITE_ROOT ."/connexion.php";
    require_once __DIR__ ."/cont_pages.php";
    
    class ModelePages extends Connexion {
        
        public function __construct($cont)
        {
            $this->con = $cont;
        }

        public function fetchExercice() {
            $_SESSION["exoID"] = intval($_GET["exo"]);
            
            $this->con->getView()->formEdit();
            
            
        }
    }
?>