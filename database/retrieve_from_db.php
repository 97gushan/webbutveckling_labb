<?php

    session_start();

    include("database.php");
    $db = new Database;

    $mail = filter_input(INPUT_GET,"email", FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_GET, "pass",FILTER_SANITIZE_STRING);


    $salt = $db->get_data($mail)[0];
    $saved_pass = $db->get_data($mail)[1];

    $crypt_pass = crypt($pass, $salt);

    if($saved_pass == $crypt_pass){
        echo "login sucessfull";
        $_SESSION["login"] = 1;
    }else{
        echo "login not sucessfull";

    }

 ?>
