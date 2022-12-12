<?php

    function recupererArchitectureIMG($sth, $ownerid, $folderParent){
        if($folderParent == null){
            $reponsse = $sth->prepare('SELECT * FROM gallery_images WHERE ownerid=:ownerid and folderParent IS NULL ');
            $reponsse->execute(array(':ownerid' => $ownerid));
        }else{
            $reponsse = $sth->prepare('SELECT * FROM gallery_images WHERE ownerid=:ownerid and folderParent=:parent');
            $reponsse->execute(array(':ownerid' => $ownerid, ':parent' => $folderParent));
        }
        $resultat=$reponsse->fetchAll();
        reponseArchitectureIMG($resultat);
    }

    function reponseArchitectureIMG($tuples){
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($tuples);
    }

