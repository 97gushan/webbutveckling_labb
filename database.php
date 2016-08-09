<?php

    class Database{

        private $conn;
        private $database = "users";

        private $host = "localhost";
        private $user = "root";
        private $pass = "root";


        private function Connect(){
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database);

            if($this->conn->connect_error){
                $code = $this->conn->connect_errno;

                die("Error: $code");
            }
        }

        public function register_user($email, $pass, $salt){
            $this->Connect();


            $sql = "INSERT INTO user(email, password, salt) VALUES(?,?,?)";

            if($stmt = $this->conn->prepare($sql)){
                $stmt->bind_param("sss", $email, $pass, $salt);

                $stmt->execute();

                if($stmt->error){
                    echo $stmt->error;
                    return false;
                }

                $stmt->close();
                $this->conn->close();
                return true;
            }

        }

    }

?>
