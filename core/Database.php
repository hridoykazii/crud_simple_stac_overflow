<?php
    class Database{
        public $conn;
        public function __construct()
        {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $connection = new PDO("mysql:host=$servername;dbname=concept", $username, $password);
        $this->conn= $connection;
        }
        //create,update,delete
        public function dataWrite($sql){

            $statement = $this->conn->prepare($sql);
            $statement->execute();
        }

        //Read
        public function dataFetch($sql){
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            return $statement->fetchAll();
        }
    }
?>