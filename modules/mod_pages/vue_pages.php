<?php
require_once "./vue_generique.php";
class VuePages extends VueGenerique
{

    public function __construct()
    {
        parent::__construct();
    }

    public function widgetList()
    {
    ?>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Principe alphabétique
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php
                            require_once(SITE_ROOT . "/widgets/components/box.php");
                            require_once(SITE_ROOT . "/widgets/components/trueorfalse.php");
                            require_once(SITE_ROOT . "/widgets/components/write.php");
                        ?> 

                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Conscience phonologique
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Décodage
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                           
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Composants
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul>

                            <li><div class="elementPreview eaxoDraggable eaxoClonable ui-draggable ui-draggable-handle" data-eaxoElement="text"></div></li>
                            <!--<li><?php require_once SITE_ROOT . "/widgets/components/templates/textinbox.php" ?></li><-->
                            <li><div class="elementPreview eaxoDraggable eaxoClonable ui-draggable ui-draggable-handle" data-eaxoElement="lines"></div></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
                <?php ?>


            <?php
        }

        public function test()
        {
            ?>
    
            <?php
        }
        public function formEdit()
        {
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

                
                <script src="./resources/scripts/widgets.js" type="module"></script>
                <script src="./resources/scripts/fonts_controller.js"  type="module"></script>

            <?php
        }

        public function fontTools()
        {
            ?>
            <div class="container-sm hideForPrint ">

                <div class="row row-cols-auto">
                    <div class="col">
                        <select id="selectFont" class="form-select" aria-label="Default select example">
                            <option selected>Arial</option>
                            <option value="1">Cursive</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <button id="btnBold"><i class="fa-solid fa-bold"></i></button>
                    <button id="btnItalic"><i class="fa-solid fa-italic"></i></button>
                    <button><i class="fa-sharp fa-solid fa-palette"></i></button>
                    <button><i class="fa-solid fa-highlighter"></i></button>
                    <div class="col col-lg-2">
                        
                        <div class="input-group mb-3">

                            <button id="decreaseFontSize" type="button" class="btn btn-light">-</button>
                            <input id="fontSizeInput" type="text" class="form-control" value="15">
                            <button id="increaseFontSize" type="button" class="btn btn-light">+</button>
                        </div>
                    </div>
                </div>

                <div class="clearfix">

                    <div id="spinnerLoading" class="d-flex align-items-center">
                        <strong class="me-2">Sauvegarde</strong>
                        <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                    </div>

                </div>

                //philippe modif
                 <script src="/resources/scripts/modules/composants_images/vue_images.js" type="module"></script>
                <!-- Button trigger modal -->
                <button type="button" id="ouvertureVolet" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Volet d'images
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Mes Images</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <?php
                        $this->contenuImages();
                      ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>

            </div>

            
            <?php

            $this->test();
        }

        public function contenuImages(){
        ?>

            <div id="divImagesHome">

                <p>texte dans truc</p>

                <img id='Dossier_Back' src="resources/images/api_images/back.png">

            </div>

        <?php

        }
    }
            ?>