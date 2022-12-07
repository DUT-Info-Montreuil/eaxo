<?php
require_once "./vue_generique.php";
class VueHome extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function homepage($names, $nb_pages, $current_page)
    {
?>

            <!-- Button trigger modal Create Exo-->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateExo">
            Ajouter une nouvelle page d'exercice
            </button>

            

            <div class="container text-center">
                <?php
                $this->generate_divs($names);
                ?>
            </div>
        </div>
            <?php
                $this->generate_pages_a($nb_pages, $current_page);
            ?>

            <!-- Modal Create Exo-->
            <div class="modal" id="modalCreateExo" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                
            <div class="modal-dialog">
            <form action="./index.php?module=mod_home&action=create_exercice" method="POST"> 
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="exerciceName"
                                placeholder="Nom">
                        <label for="floatingPassword">Nom de l'exercice</label>
                     </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button class="btn btn-primary" type="submit">Créer</button>
                </div>
                </div>
            </form>
            </div>
            </div>

            <!-- Modal Delete Exo-->
        <div class="modal" id="modalDeleteExo" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                
                <div class="modal-dialog">
                <form action="./index.php?module=mod_home&action=delete_exercice" method="POST"> 
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="deletePageDialog">
                        <div class="form-floating">
                            <p >Êtes-vous sûr de vouloir supprimer l'exercice :</p>
                            <p id="exoName"></p>
                            <input type="hidden" value="" name="exoNumber" id="exoNumber">
                         </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button class="btn btn-primary" type="submit">Supprimer</button>
                    </div>
                    </div>
                </form>
                </div>
                </div>
            
        </body>

        <?php
    }

    public function generate_divs($exercices) #Array of arrays which contains: [name,id]
    {
        $ligne = 1;
        $colonne = 0;
        if (isset($exercices) && count($exercices) > 0) {
            echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">';
        }
        foreach ($exercices as $name_id) {
                ?>
                <div class="col">
                        <div class="card shadow-sm">
                        <!-- Button trigger modal Delete Exo-->
                        <a type="button" class="open-DeletePageDialog btn-close" data-bs-toggle="modal" data-id=<?php echo $name_id["exoNumber"]?> data-name=<?php echo $name_id["name"]?> data-bs-target="#modalDeleteExo"></a>
                        <a style="text-decoration: none" href='./index.php?module=mod_pages&action=formEdit&exo=<?php echo $name_id["exoNumber"]?>'>
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" preserveAspectRatio="xMidYMid slice">
                            </svg>
                            
                            <div class="card-body">
                                <div class="card-text">
                                    <?php
                                    echo $name_id["name"];
                                    ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        
                <?php
                $colonne++;
        }
        if (isset($exercices) && count($exercices) > 0) {
            echo '</div>';
        }
       
        }

        public function generate_pages_a($number_of_pages, $current_page) {
            if ($number_of_pages <= 1)
                $number_of_pages = 1;
            echo '<div class="paginationbis">';
            echo '<div class="pagination">';
            echo '<a href="#">&laquo;</a>';
            for ($i = 1; $i <= $number_of_pages; $i++) {
                if ($i == $current_page) 
                    echo "<a href=\"./index.php?module=mod_home&action=homepage&page=$i\" class=\"active\">$i</a>";
                else
                    echo "<a href=\"./index.php?module=mod_home&action=homepage&page=$i\">$i</a>";
            }
            echo '<a href="#">&raquo;</a>';
            echo '</div>';
            echo '</div>';
        }
        
    }
?>