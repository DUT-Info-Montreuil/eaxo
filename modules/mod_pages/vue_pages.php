<?php
    class VuePages {

        public function __construct(){}
    
        public function formEdit() {
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
    }
?>