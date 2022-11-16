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

        <body>
            <div class="album py-5 bg-light ml-50">
                <div class="container text-center">
                    <?php
                    $this->generate_divs($names);
                    ?>
                </div>
            </div>
            <?php
                $this->generate_pages_a($nb_pages, $current_page);
            ?>
        </body>

        </html>

        <?php
    }

    public function generate_divs($names)
    {

        $ligne = 1;
        $colonne = 0;
        $names = array('page1', 'page2', 'page3', 'page4', 'page5');
        if (isset($names) && count($names) > 0) {
            echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">';
        }
        foreach ($names as $name) {
                ?>
                <div class="col">
                    <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" role="img" preserveAspectRatio="xMidYMid slice">
                </svg>
                        <div class="card-body">
                            <div class="card-text">
                                <?php
                                echo $name;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $colonne++;
        }
        if (isset($names) && count($names) > 0) {
            echo '</div>';
        }
        }

        public function generate_pages_a($number_of_pages, $current_page) {
            $number_of_pages = 5 ;
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