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

        $name = mysql_real_escape_string($name);
        $mail = mysql_real_escape_string($mail);
        $comment = mysql_real_escape_string($comment);

        # save the SQL command to a string
        $sql = "INSERT INTO comment(name, mail, comment) VALUES('$name','$mail','$comment')";

        # select the correct db
        mysql_select_db("content");

        $test = mysql_query($sql, $db_conn);

        mysql_close($db_conn);



    }

    public function get_comments(){
        $db_conn = mysql_connect("localhost:8889", "root", "root");

        $sql = "SELECT * FROM comment";

        mysql_select_db("content");

        $query = mysql_query($sql, $db_conn);



        while($test = mysql_fetch_array($query)){
            $name = $name . ";" . $test["name"];
            $comment = $comment . ";" . $test["comment"];
        }

        mysql_close($db_conn);

        $content = [$name, $comment];

        return $content;
    }
}

?>
