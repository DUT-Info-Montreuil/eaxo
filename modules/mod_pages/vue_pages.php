<?php
    require_once "./vue_generique.php";
    class VuePages extends VueGenerique{

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

                <div class="row row-cols-auto">
                    <div class="col">
                        <select id="selectFont" class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Cursive</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="col col-lg-2">
                        <div class="input-group mb-3">

                            <button id="decreaseFontSize" type="button" class="btn btn-light">-</button>
                            <input id="fontSizeInput" type="text" class="form-control" value="15">



                            <button id="increaseFontSize" type="button" class="btn btn-light">+</button>
                        </div>
                    </div>
                </div>

            </div>
            <?php
        }
    }
?>