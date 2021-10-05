<?php

    require('./Blog.php');
    require('Controller.php');
    require('PostController.php');

    class BlogController extends Controller {
        private $conn;

        public function __construct(){
            $this->conn = $this->DbConnect();
        }

        public function getResult(){
            $posts = new PostController();
            
            new View('posts', $posts->all);
        }
        

    }


?>