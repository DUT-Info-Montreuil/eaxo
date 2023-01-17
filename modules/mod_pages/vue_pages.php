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
                <h2 class="accordion-header" id="exerciceHeader">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHeader" aria-expanded="false" aria-controls="collapseHeader">
                        Entête
                    </button>
                </h2>
                <div id="collapseHeader" class="accordion-collapse collapse" aria-labelledby="exerciceHeader" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php
                            require_once(SITE_ROOT . "/widgets/components/exerciceheader.php");
                        ?>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Principe alphabétique
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php
                            require_once(SITE_ROOT . "/widgets/components/surrounded.php");
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
            $exoid = isset($_GET["exo"]) ? $_GET["exo"] : 0;
            ?>
                <div class ="container mt-2">
                    <div class="row">
                        <div class="widgets col-3 displaynone">
                            <?php $this->widgetList(); ?>
                        </div>

                        <div class="apercu col-sm-9">
                            <page id="pageContainer" size="A4" data-exoID=<?php echo $exoid ?>></page>
                        </div>
                    </div>

                
                <script src="./resources/scripts/widgets.js" type="module"></script>

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


                <!-- Button trigger modal -->
                <button type="button" id="ouvertureVolet" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Mes images
                </button>

                <!-- Modal -->
                <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ma galerie d'images</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <?php
                        $this->contenuImages();
                      ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

                <div id="controleurImages">

                    <img id='Dossier_Home' class='Dossier_Controleurs' src="resources/images/api_images/home.png">
                    <img id='Dossier_Add_Folder' class='Dossier_Controleurs' src="resources/images/api_images/folder_add.png">
                    <img id='Dossier_Add_Picture' class='Dossier_Controleurs' src="resources/images/api_images/picture_add.png">
                    <img id='Dossier_Back' class='Dossier_Controleurs' src="resources/images/api_images/back.png">

                    <input type="file" id="Dossier_Add_Picture_Input" accept="image/*">

                    <div id='Dossier_Contextuel_Menu'>
                        <table id='Dossier_Contextuel_Menu_Tab'>
                            <tr>
                                <td>
                                    <div id='Dossier_rename_Div' class='Dossier_Div_Menu_Contextuel'>
                                        <img id='Dossier_rename' class='Dossier_Icone_Menu_Contextuel' src='resources/images/api_images/rename.png'>
                                        <p id='Dossier_rename_text' class='Dossier_Icone_Menu_Contextuel_text'>Renomer</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id='Dossier_download_Div' class='Dossier_Div_Menu_Contextuel'>
                                         <img id='Dossier_download' class='Dossier_Icone_Menu_Contextuel' src='resources/images/api_images/download.png'>
                                         <p id='Dossier_download_text' class='Dossier_Icone_Menu_Contextuel_text'>Télécharger</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id='Dossier_delete_Div' class='Dossier_Div_Menu_Contextuel'>
                                        <img id='Dossier_delete' class='Dossier_Icone_Menu_Contextuel' src='resources/images/api_images/delete.png'>
                                        <p id='Dossier_delete_text' class='Dossier_Icone_Menu_Contextuel_text'>Supprimer</p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>

                <p id="Dossiers_Chemin"></p>

            </div>

        <?php

        }
    }
            ?>