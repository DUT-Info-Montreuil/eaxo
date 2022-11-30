<?php
    function recupererArchitectureIMG($sth, $ownerid){
        $reponsse = $sth->prepare('SELECT * FROM gallery_images WHERE ownerid=:ownerid');
        $reponsse->execute(array(':ownerid' => $ownerid));
        $resultat=$reponsse->fetchAll();
        reponsseArchitecture($resultat);

    }

    function reponsseArchitectureIMG($tuples){
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($tuples);
    }

