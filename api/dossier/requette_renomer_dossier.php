<?php
function renomerDossier($sth, $ownerid, $pName, $id){
    $update = $sth->prepare('UPDATE gallery_folders SET pName=:pName WHERE id=:id AND ownerid=:ownerid');
    $update->execute(array(':ownerid' => $ownerid, ':pName' => $pName, ':id' => $id));
    reponsseRenameFolder($update);
}

function reponsseRenameFolder($update){
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($update);
}