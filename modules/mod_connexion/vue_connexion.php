<?php
require_once "./vue_generique.php";

class VueConnexion extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function formConnexion()
    {
        ?>
        <div id="Div_Connection" class="text-center pt-5">
            <main class="form-signin w-100 mt-5 m-auto">
                <form action="./index.php?module=mod_connexion&action=connexion" method="POST">
                    <?php
                    if (!isset($_SESSION['newsession'])) {
                        ?>
                        <img class="mt-5 mb-4" src="resources/images/logo.jpg" alt="" width="100" height="100">
                        <h1 class="h3 mb-3 fw-normal">Connexion</h1>

                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" name="login"
                                   placeholder="name@example.com" value="proftest">
                            <label for="floatingInput">Adresse e-mail / Identifiant</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" name="password"
                                   placeholder="Password" minlength="8" maxlength="20" value="proftest">
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
                    } else {
                        echo "Merci de bien vouloir vous déconectez avant de vous reconnecter";
                    }
                    ?>
                </form>
            </main>
        </div>
        <?php
    }

    public function formInscription()
    {
        ?>
        <form action="./index.php?module=mod_connexion&action=new_inscription" method="POST">
            <div class="container">
                <main>
                    <div class="pt-5 text-center">
                        <img class="d-block mx-auto mb-0" src="resources/images/logo.jpg" alt="" width="100"
                             height="100">
                    </div>

                    <div class="row g-5">
                        <div class="text-center pt-5">
                            <h4 class="mb-1">Inscription</h4>
                        </div>
                        <script src="resources/scripts/modules/mod_connection/inscription.js"></script>
                        <form class="needs-validation" novalidate>

                            <div id="formulaire-saisie-inscription" class="row g-3 col-md-5">

                                <div class="col-sm-6">
                                    <label for="motDePasse1" class="form-label">Mot de passe</label>
                                    <input type="text" class="form-control" id="motDePasse1" placeholder="1234" value=""
                                           name="passwd" required minlength="8" maxlength="20">
                                    <div class="invalid-feedback">Mot de passe obligatoire</div>
                                </div>

                                <div id="motDePasseIncorect" class="col-sm-6">
                                    <label for="motDePasse2" class="form-label">Confirmation du mot de passe</label>
                                    <input type="text" class="form-control" id="motDePasse2" placeholder="1234" value=""
                                           required>
                                    <div class="invalid-feedback">Validation du mot de passe obligatoire</div>
                                </div>

                                <p id="motDePassentCorrespondentPas" class="pt-0 mt-0 mb-0">*Les mots de passes ne correspondent pas</p>

                                <div class="col-12 mt-1">
                                    <label for="username" class="form-label">Nom d'utilisateur</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">#</span>
                                        <input type="text" class="form-control" id="username" placeholder="Username"
                                               name="username" required maxlength="20">
                                        <div class="invalid-feedback">Nom d'utilisateur Invalide</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                                    <input type="email" class="form-control" id="email"
                                           placeholder="utilisateur@example.com" name="emailAdress">
                                    <div class="invalid-feedback">adresse e-mail invalide</div>
                                </div>

                                <button id="bouton_send_incription" class="w-100 btn btn-primary btn-lg" type="submit">
                                    Inscription
                                </button>
                        </form>
                    </div>
                </main>

                <footer class="my-5 pt-0 text-muted text-center text-small">
                    <p class="mb-1">&copy; 2022–2023 EAXO</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a
                                    href="https://www.cnil.fr/fr/reglement-europeen-protection-donnees">Vie privé</a>
                        </li>
                        <li class="list-inline-item"><a href="https://github.com/DUT-Info-Montreuil/eaxo">Code</a></li>
                        <li class="list-inline-item"><a
                                    href="https://github.com/DUT-Info-Montreuil/eaxo/blob/main/README.md">Support</a>
                        </li>
                    </ul>
                </footer>
            </div>
        </form>
        <?php
    }
}

?>