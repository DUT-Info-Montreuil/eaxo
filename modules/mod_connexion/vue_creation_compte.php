
<?php
class VueInscription {


    public function formInscription() {
    ?>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <img class="d-block mx-auto mb-4" src="../../sources/Images/logo.jpg" alt="" width="100" height="100">
                </div>

                <div class="row g-5">
                        <div class="text-center pt-5">
                            <h4 class="mb-5">Inscription</h4>
                        </div>

                            <form id="formulaire-saisie-inscription" class="needs-validation" novalidate>

                                <div class="row g-3 col-md-5">

                                    <div class="col-sm-6">
                                        <label for="motDePasse1" class="form-label">Mot de passe</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="1234" value="" name="passwd" required minlength="8" maxlength="20">
                                        <div class="invalid-feedback">
                                            Un mot de passe est requis.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="motDePasse2" class="form-label">Confirmation du mot de passe</label>
                                        <input type="text" class="form-control" id="lastName" placeholder="1234" value="" required>
                                        <div class="invalid-feedback">
                                            Une validation du mot de passe est requis.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="username" class="form-label">Nom d'utilisateur</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text">#</span>
                                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" required maxlength="20">
                                            <div class="invalid-feedback">
                                               Un nom d'utilisateur est requis.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                                        <input type="email" class="form-control" id="email" placeholder="utilisateur@example.com" name="email">
                                        <div class="invalid-feedback">
                                            Veuillez entrer une adresse e-mail valide.
                                        </div>
                                    </div>

                                <button id="bouton_send_incription" class="w-100 btn btn-primary btn-lg" type="submit">Inscription</button>
                            </form>
                </div>
            </main>

            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2017–2022 EAXO</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="https://www.cnil.fr/fr/reglement-europeen-protection-donnees">Vie privé</a></li>
                    <li class="list-inline-item"><a href="https://github.com/DUT-Info-Montreuil/eaxo">Code</a></li>
                    <li class="list-inline-item"><a href="https://github.com/DUT-Info-Montreuil/eaxo/blob/main/README.md">Support</a></li>
                </ul>
            </footer>
        </div>
        <?php
    }
}