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

        private function is_mail_unique($mail){
            $this->Connect();
            $sql = "SELECT email FROM user";

            if($stmt = $this->conn->prepare($sql)){
                $stmt->execute();

                if($stmt->error){
                    echo $stmt->error;
                    return false;
                }

                $stmt->bind_result($email);

                $current_mails = array();

                # get all the already registered emails
                while($stmt->fetch()){
                    array_push($current_mails, $email);
                }

                $stmt->free_result();

                $unique = true;

                # check if the entered mail is equal to one of the already
                # registered emails
                for($x = 0; $x < count($current_mails); $x++){
                    if(strcmp($current_mails[$x], $mail) == 0){
                        $unique = false;
                        break;      # if a match is found, break the loop
                    }else{
                        $unique = true;
                    }
                }

                $stmt->close();
                $this->conn->close();

                return $unique;
            }
        }

        public function register_user($email, $pass, $salt){

            $r = $this->is_mail_unique($email);

            $this->Connect();

            if($r){
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

        public function get_data($mail){
            $this->Connect();

            $sql = "SELECT salt, password FROM user WHERE email=?";

            if($stmt = $this->conn->prepare($sql)){

                $stmt->bind_param("s", $mail);

                $stmt->execute();

                if($stmt->error){
                    echo $stmt->error;
                    return false;
                }

                $stmt->bind_result($salt, $pass);

                $stmt->fetch();


                $stmt->free_result();


                $stmt->close();
                $this->conn->close();
                return [$salt, $pass];

            }
        }

    }

?>
