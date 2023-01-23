<?php
class VueGenerique {
    public function __construct() {
        ob_start();
    }

    public function getAffichage() {
        return ob_get_clean();
    }
}

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>