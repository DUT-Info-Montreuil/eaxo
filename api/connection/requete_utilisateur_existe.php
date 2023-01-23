<?php

    function verifUtilisateurExiste($sth, $user){
        $reponse = $sth->prepare('SELECT username FROM users WHERE username=:userTest');
        $reponse->execute(array(':userTest' => $user));
        $resultat=$reponse->fetch();
        if($resultat){
            reponseArchitecture($resultat['username']);
        }else{
            reponseArchitecture(null);
        }
    }

    function reponseUser($tuple){
        header('Content-Type: application/json; charset=utf-8');

        if($tuple == null){
            $tuple = "";
        }

        $reponse = [
            "username" => $tuple
        ];

        echo json_encode($reponse);
    }


/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
