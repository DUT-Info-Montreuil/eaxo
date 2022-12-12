<?php

function supprimerIMG($sth, $ownerid, $id){
    if($id == null){
        $supression = $sth->prepare('DELETE FROM gallery_images WHERE id IS NULL AND ownerId=:ownerId');
        $supression->execute(array(':ownerId' => $ownerid));
    }else{
        $supression = $sth->prepare('DELETE FROM gallery_images WHERE id=:id AND ownerId=:ownerId');
        $supression->execute(array(':ownerId' => $ownerid, ':id' => $id));
    }
    reponsseDelIMG($supression);
}

function reponsseDelIMG($supression){
    header('Content-Type: application/json; charset=utf-8');
    if ($supression)
        echo json_encode(true);
    else
        echo json_encode(false);
}