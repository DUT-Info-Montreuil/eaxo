<?php

function ajouterImage($sth, $ownerid, $image, $pName, $folderParent){
    if($folderParent == "")
        $folderParent = null;
    $insert = $sth->prepare('INSERT INTO gallery_images (folderParent, pName, Img64, ownerId) VALUES (:folderParent, :pName, :Img64 ,:ownerid)');
    $insert->execute(array(':ownerid' => $ownerid, ':pName' => $pName, ':Img64' => $image, ':folderParent' => $folderParent));
    reponseInsertIMG($insert);
}

function reponseInsertIMG($insert){
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($insert);
}