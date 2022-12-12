<?php
function ajouterDossier($sth, $ownerid, $pName, $folderParent){
    if($folderParent == '')
        $folderParent = null;
    $insert = $sth->prepare('INSERT INTO gallery_folders (folderParent, pName, ownerId) VALUES (:folderParent, :pName,:ownerid)');
    $insert->execute(array(':ownerid' => $ownerid, ':pName' => $pName, ':folderParent' => $folderParent));
    $id = $sth -> lastInsertId();
    reponsseInserFolder($id);
}

function reponsseInserFolder($id){
    header('Content-Type: application/json; charset=utf-8');
    $insert =  array('id' => $id);
    echo json_encode($insert);
}