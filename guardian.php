<?php
function create_token() {
    $bytes = random_bytes(20);

    $_SESSION['token'] = bin2hex($bytes);

    $_SESSION['token_date'] = time();
}

function token_verification() {
    var_dump($_SESSION['token']);
    var_dump($_POST['token']);
    return strcmp($_POST['token'], $_SESSION['token']) == 0 && time() - $_SESSION['token_date'] < 4000;
}

?>