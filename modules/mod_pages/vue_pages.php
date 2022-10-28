<?php
    require_once "./vue_generique.php";
    class VuePages extends VueGenerique{

        public function __construct(){
            parent::__construct();
        }

        public function widgetList() {
            ?>

                <div id="accordion">
                    <h3>Principe Alphabétique</h3>
                    <div>
                        <?php
                            require_once (SITE_ROOT . "/widgets/components/box.php");
                            require_once (SITE_ROOT . "/widgets/components/trueorfalse.php");

                        ?>
                    </div>
                        <h3>Section 2</h3>
                    <div>
                        <p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna. </p>
                    </div>
                        <h3>Section 3</h3>
                    <div>
                        <p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui. </p>
                    <ul>
                        <li>List item</li>
                        <li>List item</li>
                        <li>List item</li>
                        <li>List item</li>
                        <li>List item</li>
                        <li>List item</li>
                        <li>List item</li>
                    </ul>
                    </div>

                    <h3>Base</h3>
                    <div>
                        <ul>

                            <li><?php require_once SITE_ROOT. "/widgets/components/box.php" ?></li>
                            <li><?php require_once SITE_ROOT . "/widgets/components/trueorfalse.php" ?></li>
                            <li><?php require_once SITE_ROOT . "/widgets/components/text.php" ?></li>
                            <li><?php require_once SITE_ROOT . "/widgets/components/templates/textinbox.php" ?></li>
                        </ul>
                    </div>
                </div>

                <?php ?>


            <?php
        }
    
        public function formEdit() {
            $this->fontTools();
            
            ?>

            
                <div class ="container mt-2">
                <div class="row">
                    <div class="widgets col-3 displaynone">
                        <?php $this->widgetList(); ?>
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