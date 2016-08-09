<?php

    require("include/database.php");

    $name = "hej";
    $comment = "då";

    $db = new Database();

    $all_comments = $db->get_comments();

    $name = split(";",$all_comments[0]);
    $comment = split(";", $all_comments[1]);

    for($n = 1; $n < count($name); ++$n){
        echo "<div style='background: lightblue; margin-left: 10px; width: 25%; padding-bottom: 5px;'>
        <h3 style='padding-left: 10px;' >$name[$n]</h3>
        <p style='padding-left: 5px; width: 100%;'>$comment[$n]</p>
        </div>";
    }


?>
