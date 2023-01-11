<?php
require_once "./vue_generique.php";
class VueUserList extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function display($users) {
        ?>
        <script src="./resources/scripts/widgets.js" type="module"></script>
        <div class="d-flex justify-content-center mt-3">
            <?php
            $this->usersList($users);
            ?>
        </div>
        <!-- Modal Delete Exo-->
        <div class="modal" id="modalDeleteUser" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                
                <div class="modal-dialog">
                <form action="./index.php?module=mod_home&action=delete_user" method="POST"> 
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression d'un utilisateur</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="deletePageDialog">
                        <div class="form-floating">
                            <p >Êtes-vous sûr de vouloir supprimer l'utilisateur :</p>
                            <p id="name"></p>
                            <input type="hidden" value="" name="userId" id="id">
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
                <script src="./resources/scripts/widgets.js" type="module"></script>
        <?php
    }

    public function usersList($users) #Array of arrays which contains: [name, id, number of exercices]
    {
        if (isset($users) && count($users) > 0) {
            echo '<ul class="list-group w-50 justify-content-between gap-1">';
        }
        ?>
        <li class="list-group-item w-100 d-flex justify-content-between align-items-center align-items-middle">
                <p>Nom d'utilisateur </p>
                <p>Nombre d'exercices</p>
                <div></div>
        </li>
        <?php
        
        foreach ($users as $name_id) {
            ?>
            
            <li class="list-group-item w-100 d-flex justify-content-between align-items-center">
                <p><?php echo htmlspecialchars($name_id["username"])?> </p>
                <p><?php echo $name_id["nbExo"]?></p>
            <button type="button" class="open-idNameToModal btn btn-danger" data-bs-toggle="modal" data-id=<?php echo $name_id["id"]?> data-name=<?php echo htmlspecialchars($name_id["username"])?> data-bs-target="#modalDeleteUser">Supprimer</button>

        </li>
        <?php
        }
        if (isset($users) && count($users) > 0) {
            echo '</ul>';
        }
    }
}
?>