<?php

function renommerImage($sth, $ownerid, $pName, $id){
    if($id == null){
        $update = $sth->prepare('UPDATE gallery_images SET pName=:pName WHERE id IS NULL AND ownerid=:ownerid');
        $update->execute(array(':ownerid' => $ownerid, ':pName' => $pName));
    }else{
        $update = $sth->prepare('UPDATE gallery_images SET pName=:pName WHERE id=:id AND ownerid=:ownerid');
        $update->execute(array(':ownerid' => $ownerid, ':pName' => $pName, ':id' => $id));
    }
    reponseRenameImage($update);
}

function reponseRenameImage($update){
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($update);
}