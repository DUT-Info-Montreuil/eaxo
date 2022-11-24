<?php
    class Exercice {
        private $action;
        private $api;

        public function __construct($api)
        {
            $this->action = $_GET["action"];
            $this->api = $api;
        }

        public function exec() {
            switch($this->action) {
                case "fetchAll":
                    require_once __DIR__ ."/fetchAll.php";
                    break;
            }
        }

        public function getConnected() {
            return $this->api->getConnected();
        }
    }
?>