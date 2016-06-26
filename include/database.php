<?php

    class Database{

        private $conn;
        private $database = "content";

        private $host = "localhost";
        private $user = "root";
        private $pass = "root";

    public function add_comment($name, $mail, $comment){
        $db_conn = mysql_connect("localhost:8889", "root", "root");

        # Check so a connection with the db is established
        if(!$db_conn){
            printf("Connect failed: ", mysql_error());
        }

        # save the SQL command to a string
        $sql = "INSERT INTO comment(name, mail, comment) VALUES('$name','$mail','$comment')";

        # select the correct db
        mysql_select_db("content");

        $test = mysql_query($sql, $db_conn);

        mysql_close($db_conn);



    }

    public function get_comments(){

    }
}

?>
