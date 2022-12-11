<?php
function supprimerDossier($sth, $ownerid, $id){
    $remove = $sth->prepare('DELETE FROM gallery_folders WHERE id=:id AND ownerId=:ownerId');
    $remove->execute(array(':ownerId' => $ownerid, ':id' => $id));
    $remove1 = $sth->prepare('DELETE FROM gallery_images WHERE folderParent=:id AND ownerId=:ownerId');
    $remove1->execute(array(':ownerId' => $ownerid, ':id' => $id));
    reponsseDelFolder($remove);
}

function reponsseDelFolder($remove){
    header('Content-Type: application/json; charset=utf-8');
    if($remove)
       echo json_encode(true);
    else
       echo json_encode(false);
}