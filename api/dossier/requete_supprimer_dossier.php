<?php
function supprimerDossier($sth, $ownerid, $id){
    if($id == null){
        $remove = $sth->prepare('DELETE FROM gallery_folders WHERE id IS NULL AND ownerId=:ownerId');
        $remove1 = $sth->prepare('DELETE FROM gallery_images WHERE folderParent IS NULL AND ownerId=:ownerId');
        $remove->execute(array(':ownerId' => $ownerid));
        $remove1->execute(array(':ownerId' => $ownerid));
    }else{
        $remove = $sth->prepare('DELETE FROM gallery_folders WHERE id=:id AND ownerId=:ownerId');
        $remove1 = $sth->prepare('DELETE FROM gallery_images WHERE folderParent=:id AND ownerId=:ownerId');
        $remove->execute(array(':ownerId' => $ownerid, ':id' => $id));
        $remove1->execute(array(':ownerId' => $ownerid, ':id' => $id));
    }
    reponseDelFolder($remove, $remove1);
}

function reponseDelFolder($remove, $remove1){
    header('Content-Type: application/json; charset=utf-8');
    if($remove && $remove1)
       echo json_encode(true);
    else
       echo json_encode(false);
}