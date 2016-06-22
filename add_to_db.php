<?php
    require("include/database.php");

    $name = filter_input(INPUT_GET,"name", FILTER_SANITIZE_STRING);
    $mail = filter_input(INPUT_GET, "email",FILTER_VALIDATE_EMAIL);
    $comment = filter_input(INPUT_GET, "comment", FILTER_SANITIZE_STRING);

    $db = new Database();

    $test = $db->add_comment($name, $mail, $comment);

    echo $test;
?>
