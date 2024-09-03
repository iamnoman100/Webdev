<?php

    Class crudApp{
        private $conn;

        public function __construct() {
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "crudapp";

            $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            if(!$this->conn){
                die("database connection error");
            }
        }
    }
?>