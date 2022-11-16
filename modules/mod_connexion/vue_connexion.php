

<?php
    require_once "./vue_generique.php";
    class VueConnexion extends VueGenerique {
        public function __construct()
        {
            parent::__construct();
        }

        public function formConnexion() {
            ?>
            <div id="Div_Connection" class="text-center pt-5">
            <main class="form-signin w-100 mt-5 m-auto">
                <form action="./index.php?module=mod_connexion&action=connexion" method="POST"> 
                  <?php
                    if (!isset($_SESSION['newsession'])) {
                    ?>
                                    <input type="hidden" name="token" value='<?php echo $_SESSION['token']?>'> <!--TOKEN -->

                    <img class="mt-5 mb-4" src="sources/Images/logo.jpg" alt="" width="100" height="100">
                    <h1 class="h3 mb-3 fw-normal">Connexion</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name = "login" placeholder="name@example.com" value="proftest">
                <label for="floatingInput">Adresse e-mail / Identifiant</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name = "password" placeholder="Password" minlength="8" maxlength="20" value="proftest">
                <label for="floatingPassword">Mot de passe</label>
            </div>

            <a id="TextePasEncoreDeCompte" href="https://example.com">pas encore de compte ?</a>

                    <div class="checkbox mt-2 mb-2">
                        <label>
                            <input id="test" type="checkbox" value="remember-me" checked> Se souvenir de moi
                        </label>
                    </div>
                    <button id="bouton_send" class="w-100 btn btn-lg btn-warning" type="submit">Connexion</button>
                    <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>

                    <?php
                    }
                    else {
                        echo "t'es deja co mec";
                    }
                    ?>
                </form>
            </main>
        </div>
        <?php
        }
    }
?>