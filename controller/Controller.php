<?php

    include('lk-config.php');
    include('./view/View.php');

    class Controller {

        public $host = HOST;
        public $user = DB_USER;
        public $password = DB_PASS;
        public $db = DB_NAME;

        public function DbConnect(){
            $connection = mysqli_connect($this->host,$this->user,$this->password,$this->db); 
            return $connection;
        }

        public function getData($conn, $sql, $limit = false){
            $data = mysqli_query($conn, $sql.' LIMIT '.$limit);

            return $data;

        }
        
    }

?>