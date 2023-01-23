<?php
function renommerDossier($sth, $ownerid, $pName, $id){
    if($id == null) {
        $update = $sth->prepare('UPDATE gallery_folders SET pName=:pName WHERE id IS NULL AND ownerid=:ownerid');
        $update->execute(array(':ownerid' => $ownerid, ':pName' => $pName));
    }
    else {
        $update = $sth->prepare('UPDATE gallery_folders SET pName=:pName WHERE id=:id AND ownerid=:ownerid');
        $update->execute(array(':ownerid' => $ownerid, ':pName' => $pName, ':id' => $id));
    }
    reponseRenameFolder($update);
}

function reponseRenameFolder($update){
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($update);
}

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/