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
?>