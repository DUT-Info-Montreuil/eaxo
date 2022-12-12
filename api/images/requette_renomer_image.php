<?php

function renomerImage($sth, $ownerid, $pName, $id){
    $update = $sth->prepare('UPDATE gallery_images SET pName=:pName WHERE id=:id AND ownerid=:ownerid');
    $update->execute(array(':ownerid' => $ownerid, ':pName' => $pName, ':id' => $id));
    reponsseRenameImage($update);
}

function reponsseRenameImage($update){
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($update);
}