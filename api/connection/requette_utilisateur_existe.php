<?php

    function verifUtilisateurExiste($sth, $user){
        $reponsse = $sth->prepare('SELECT username FROM users WHERE username=:userTest');
        $reponsse->execute(array(':userTest' => $user));
        $resultat=$reponsse->fetch();
        if($resultat){
            reponsseUser($resultat['username']);
        }else{
            reponsseUser(null);
        }
    }

    function reponsseUser($tuple){
        header('Content-Type: application/json; charset=utf-8');

        if($tuple == null){
            $tuple = "";
        }

        $reponse = [
            "username" => $tuple
        ];

        echo json_encode($reponse);
    }



