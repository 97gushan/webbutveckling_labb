<?php

    class Database{

        private $conn;
        private $database = "content";

        private $host = "localhost";
        private $user = "root";
        private $pass = "root";


    private function Connect(){
        $this->conn = new mysqli($this->host,$this->user, $this->pass, $this->database);

        if($this->conn->connect_error){
            $code = $conn->connect_errno;
            die("Error: $code");
        }

        $this->conn->set_charset("utf8");

    }

    public function add_comment($name, $mail, $comment){
        $this->Connect();

        $sql = "INSERT INTO comments( name, email, content) VALUES (?,?,?)";

        if($stmt = $this->conn->prepare($sql)){
            $stmt->bind_param("sss", $name, $mail, $comment);
            $stmt->execute();
            if($stmt->error)
            {
              echo $stmt->error;
              return "false";
            }
            $stmt->close();
            $this->conn->close();
            return "true";
        }
        $this->conn->close();
        return "false";

    }
}

?>
