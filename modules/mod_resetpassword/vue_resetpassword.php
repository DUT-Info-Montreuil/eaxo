<?php
require_once "./vue_generique.php";
class VueResetPassword extends VueGenerique
{

    public function __construct()
    {
        parent::__construct();
    }


    public function reinitialisationMdp()
    {
        ?>
            <div class="'text-center pt-5">
                <div class="form-signin w-100 mt-5 m-auto">
                    <form class ="text-center" action="./index.php?module=mod_resetpassword&action=reset" method="POST">
                        <img class="mt-5 mb-4" src="resources/images/logo.jpg" alt="" width="100" height="100">
                        <h1 class="h3 mb-3 fw-normal">Réinitialisation du mot de passe</h1>
                    

                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" name="login" placeholder="name@example.com">
                            <label for="floatingInput">Adresse e-mail / Identifiant</label>
                        </div>
                            

                        <button id="bouton_send" class="w-100 btn btn-lg btn-warning mt-2" type="submit">Réinitialisation</button>
                    </form>
                </div>
                
            </div>
        <?php
    }

    public function changerMdp($token) {
        ?>
        <form action="./index.php?module=mod_resetpassword&action=changepassword&value=<?php echo $token ?>" method="POST">
            <input type="hidden" name="token" value='<?php echo $_SESSION['token']?>'>
            <div class="container">
                <main>
                    <div class="pt-5 text-center">
                        <img class="d-block mx-auto mb-0" src="resources/images/logo.jpg" alt="" width="100"
                             height="100">
                    </div>

                    <div class="row g-5">
                        <div class="text-center pt-5">
                            <h4 class="mb-1">Réinitilisation mot de passe</h4>
                        </div>

                        <div id="forceMotPasseMinimal" class="pt-0 pb-0 ml-0 mr-0 mb-0">
                            <p id="specMotPasse" class="pt-0 mt-0 mb-0">Le mot de passe doit contenir :</p>
                            <p id="MinusculeMDP" class="pt-0 mt-0 mb-0">⋰ Au moins une minuscule</p>
                            <p id="MajusculeMDP" class="pt-0 mt-0 mb-0">⋰ Au moins une majuscule</p>
                            <p id="chifreMDP" class="pt-0 mt-0 mb-0">⋰ Au moins un chiffre</p>
                            <p id="characteresMDP" class="pt-0 mt-0 mb-0">⋰ Au moins huit caractères</p>
                            <p id="CharactereMDP" class="pt-0 mt-0 mb-0">⋰ Un de ces caractères spéciaux: $ @ % * + - _ !</p>
                        </div>

                        <script src="resources/scripts/modules/mod_connection/inscription.js"></script>
                        <form class="needs-validation" novalidate>

                            <div id="formulaire-saisie-inscription" class="row g-3 col-md-5">

                                <div class="col-sm">
                                    <label for="motDePasse1" class="form-label">Mot de passe</label>
                                    <input type="text" class="form-control" id="motDePasse1" placeholder="1234" value=""
                                           name="password" required maxlength="64">
                                    <div class="invalid-feedback">Mot de passe obligatoire</div>
                                </div>

                                <button id="bouton_send" class="w-100 btn btn-primary btn-lg" type="submit">
                                    Mettre à jour
                                </button>
                        </form>
                    </div>
                </main>

            </div>
        </form>
    <?php
    }

    public function afficherMotDePasseChanger() {
        ?>
        <div class="text-center">
            <p>Le mot de passe a été changé, vous pouvez maintenant vous connecter</p>
        </div>

        <?php
    }

    public function afficherLienExpire() {
        ?>
        <div class="text-center">
            <p>Le lien a expiré</p>
        </div>

        <?php
    }

    public function emailEnvoye() {
        echo "Un email contenant un lien de réinitialisation vous a été envoyé";
    }

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
}
?>