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

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/