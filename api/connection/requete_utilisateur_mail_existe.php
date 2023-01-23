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

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/