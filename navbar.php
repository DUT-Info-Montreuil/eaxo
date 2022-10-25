<nav class="p-3 text bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="./index.php?module=mod_pages&action=formEdit" class="nav-link px-2 text-white">Accueil</a></li>
                <li><a href="https://github.com/DUT-Info-Montreuil/eaxo" class="nav-link px-2 text-white">Documentation</a></li>
                <li><a href="https://github.com/DUT-Info-Montreuil" class="nav-link px-2 text-secondary">A propos de nous :)</a></li>
            </ul>

            <div class="text-end">
            <?php
                    if (!isset($_SESSION['newsession'])) {
                        
                ?>
                    <a href="./index.php?module=mod_connexion&action=form_connexion" type="button" class="btn btn-outline-light me-2">Connexion</a>
                    <button type="button" class="btn btn-warning">Creer un compte</button>
                    <?php
                    }
                    else {
                ?>
                 <a href="./index.php?module=mod_connexion&action=deconnexion" type="button" class="btn btn-warning">Deconnexion</a>
                 <?php
                    }
                ?>
            </div>
        </div>
    </div>
</nav>
