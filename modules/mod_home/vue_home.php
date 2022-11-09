<?php
require_once "./vue_generique.php";
class VueHome extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function homepage($names)
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
        </body>

        </html>

        <?php
    }

    public function generate_divs($names)
    {
        $colonne = 0;
        $names = array('page1', 'page2', 'page3', 'page4', 'page5');
        foreach ($names as $name) {
            if ($colonne % 3 == 0) {
        ?>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">
                <?php
            }
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
                if ($colonne % 3 == 2) {
                ?>
                </div>
<?php
                }
                $colonne++;
            }
        }
    }
?>