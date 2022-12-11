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
        <div class="'text-center pt-5">
        <div class="form-signin w-100 mt-5 m-auto">
            <form class ="text-center" action="./index.php?module=mod_resetpassword&action=changepassword&value=<?php echo $token ?>" method="POST">
                <img class="mt-5 mb-4" src="resources/images/logo.jpg" alt="" width="100" height="100">
                <h1 class="h3 mb-3 fw-normal">Changement mot de passe</h1>
            

                <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" minlength="8" maxlength="20">
                </div>
                    

                <button id="bouton_send" class="w-100 btn btn-lg btn-warning mt-2" type="submit">Modifier</button>
            </form>
        </div>
    </div>
    <?php
    }


    public function emailEnvoye() {
        echo "Un email contenant un lien de réinitialisation vous a été envoyé";
    }

    
}
?>