<?php
    include 'Database.php';
    class User extends Database{
        //Register
        public function register($username,$password,$email){
            $password = md5($password);
            $query = "INSERT INTO users (username, password, email) VALUES ('$username','$password','$email')";
            $this->dataWrite($query);
        }
        //Login
        public function login($username, $password){
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
            $result = $this->dataFetch($query);
            return $result;
        }

    }

?>