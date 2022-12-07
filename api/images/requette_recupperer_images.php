<?php

    function recupererArchitectureIMG($sth, $ownerid, $folderParent){
        $reponsse = $sth->prepare('SELECT * FROM gallery_images WHERE ownerid=:ownerid and folderParent=:parent');
        $reponsse->execute(array(':ownerid' => $ownerid, ':parent' => $folderParent));
        $resultat=$reponsse->fetchAll();
        reponsseArchitectureIMG($resultat);
    }

    function reponsseArchitectureIMG($tuples){
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($tuples);
    }

