<?php
function ajouterDossier($sth, $ownerid, $pName, $folderParent){
    $insert = $sth->prepare('INSERT INTO gallery_folders (folderParent, pName, ownerId) VALUES (:folderParent, :pName,:ownerid)');
    $insert->execute(array(':ownerid' => $ownerid, ':pName' => $pName, ':folderParent' => $folderParent));
    reponsseInserFolder($insert);
}

function reponsseInserFolder($insert){
    header('Content-Type: application/json; charset=utf-8');
    if($insert)
        echo json_encode(true);
    else
        echo json_encode(false);
}