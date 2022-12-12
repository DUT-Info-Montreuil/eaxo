<?php

    function verifMailExiste($sth, $mail){
        $reponsse = $sth->prepare('SELECT email FROM users WHERE email=:userMail');
        $reponsse->execute(array(':userMail' => $mail));
        $resultat=$reponsse->fetch();
        if($resultat){
            reponseMail($resultat['email']);
        }else{
            reponseMail(null);
        }
    }

    function reponseMail($tuple){
        header('Content-Type: application/json; charset=utf-8');
        if($tuple == null){
            $tuple = "";
        }
        $reponse = [
            "mail" => $tuple
        ];
        echo json_encode($reponse);
    }