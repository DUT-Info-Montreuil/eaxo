<?php
    class VuePages {

        public function __construct(){}
    
        public function formEdit() {
            $this->fontTools();
            ?>

            
                <div class ="container mt-2">
                <div class="row">
                    <div class="widgets col-3 displaynone">
                        <?php require_once(SITE_ROOT . "/widgets_list.php") ?>
                    </div>

                    </div>

                    <div class="apercu col-sm-9">
                        <page id="pageContainer" size="A4"></page>
                    </div>
                </div>
                
            <?php
        }

        public function fontTools() {
            ?>
            <div class="container-sm">

                <select id="selectFont" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">Caveat</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <?php
        }
    }
?>