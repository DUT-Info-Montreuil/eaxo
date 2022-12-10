<?php

class VueNavbarAdmin
{
    public function __construct()
    {
    }

    public function vueNavbar()
    {
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Administrateur</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Outils
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Gestion des utilisateurs professeurs</a></li>
                        <li><a class="dropdown-item" href="#">Gestion des administrateurs</a></li>
                    </ul>
                    </li>
                </ul>
                </div>
                <a href="./index.php?module=mod_connexion&action=deconnexion" type="button"
                               class="btn btn-warning">Deconnexion</a>
            </div>
        </nav>
        <?php
    }
}

?>