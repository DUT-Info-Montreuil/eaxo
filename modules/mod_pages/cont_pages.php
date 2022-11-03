<?php
    require_once(__DIR__ ."/modele_pages.php");
    require_once(__DIR__ ."/vue_pages.php");
    require_once(__DIR__ ."/components/traitement.php");

    class ContPages {
        public function __construct()
        {

            $this->m = new ModelePages();
            $this->v = new VuePages();
            $this->saveExercice = new SaveExerice();
            $this->action = isset($_GET['action']) ? $_GET['action'] : "formEdit";
            $this->exec();
        }


        public function exec() {

            switch($this->action) {
                case "formEdit":
                    $this->v->formEdit();
                    break;
                case "save":
                    $this->saveExercice->save();
                    break;
            }

        }
    }
?>