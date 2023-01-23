<?php
function create_token() {
    $bytes = random_bytes(20);

    $_SESSION['token'] = bin2hex($bytes);

    $_SESSION['token_date'] = time();
}

function token_verification() {
    return isset($_SESSION['token']) && isset($_POST['token']) && strcmp($_POST['token'], $_SESSION['token']) == 0 && time() - $_SESSION['token_date'] < 4000;
}

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/
?>