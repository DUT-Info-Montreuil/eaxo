<?php

    function recupererArchitecture($sth, $ownerid){
        $reponsse = $sth->prepare('SELECT * FROM gallery_folders WHERE ownerid=:ownerid');
        $reponsse->execute(array(':ownerid' => $ownerid));
        $resultat=$reponsse->fetchAll();
        reponseArchitecture($resultat);
    }

    function reponseArchitecture($tuples){
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($tuples);
    }
