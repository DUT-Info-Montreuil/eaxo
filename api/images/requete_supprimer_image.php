<?php

function supprimerIMG($sth, $ownerid, $id){
    if($id == null){
        $supression = $sth->prepare('DELETE FROM gallery_images WHERE id IS NULL AND ownerId=:ownerId');
        $supression->execute(array(':ownerId' => $ownerid));
    }else{
        $supression = $sth->prepare('DELETE FROM gallery_images WHERE id=:id AND ownerId=:ownerId');
        $supression->execute(array(':ownerId' => $ownerid, ':id' => $id));
    }
    reponseDelIMG($supression);
}

function reponseDelIMG($supression){
    header('Content-Type: application/json; charset=utf-8');
    if ($supression)
        echo json_encode(true);
    else
        echo json_encode(false);
}

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/