<?php
    include("database.php");
    $db = new Database;

    $mail = filter_input(INPUT_GET,"email", FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_GET, "pass",FILTER_SANITIZE_STRING);
    $salt = filter_input(INPUT_GET, "salt", FILTER_SANITIZE_STRING);

    $crypt_pass = crypt($pass, $salt);

    $result = $db->register_user($mail, $crypt_pass, $salt);

    echo $result;
 ?>
