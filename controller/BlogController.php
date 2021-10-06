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

            if(isset($_GET['type'])){

                switch($_GET['type']){
                    case 'list':
                        //index.php?type=list
                        $this->postsList();
                    break;

                    case 'post':
                        //index.php?action=single&id=x
                        if(isset($_GET['id'])){
                            $this->singlePost($_GET['id']);
                        }
                    break;    
                }

            }
            
        }

        public function postsList(){
            $posts = new PostController();
            
            new View('posts', $posts->all);
        }

        public function singlePost($postId){

            $post = new PostController($postId);

            new View('single', $post->single);

        }
        

    }


?>