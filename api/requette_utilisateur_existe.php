<?php

    function verifUtilisateurExiste($sth, $user){
        $reponsse = $sth->prepare('SELECT username FROM users WHERE username=:userTest');
        $reponsse->execute(array(':userTest' => $user));
        $resultat=$reponsse->fetch();
        reponsse($resultat['username']);
    }

    function reponsse($tuple){
        header('Content-Type: application/json; charset=utf-8');

        $reponse = [
            "username" => $tuple
        ];

        echo json_encode($reponse);
    }



