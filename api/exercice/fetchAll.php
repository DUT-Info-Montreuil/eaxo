<?php
    require_once "../api.php";

    class FetchAll extends Api{
        private $exoID;
        public function __construct()
        {
            $this->exoID = $_GET["exo"];
            $this->fetch();
        }

        public function fetch() {
            if($this->getConnected()) {

            } else {
                echo "not connected";
            }
        }
    }

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>