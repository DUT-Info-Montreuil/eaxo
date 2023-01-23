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

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/