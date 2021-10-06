<?php

require('./Post.php');

class PostController extends Controller {
    private $conn;
    public $all;
    public $single;
    
    public function __construct($postId = false){
        $this->conn = $this->DbConnect();

        if(!$postId){
            $this->all = $this->getAll();
        } else $this->single = $this->getSinglePostById($postId);
        
    }

    public function postLoop($posts){
        $allPosts = [];

        while($row = mysqli_fetch_array($posts)) {
            
            $id = $row['id'];
            $title = $row['title'];
            $link = $row['link'];
            $content = $row['content'];
            $uri = $row['uri'];

            array_push($allPosts, new Post($id, $title, $link, $content, $uri));

        }

        return $allPosts;
    }

    public function getAll(){
        $sql = "SELECT * FROM post";
        $postsAll = $this->getData($this->conn, $sql, POST_LIMIT);
        return $this->postLoop($postsAll);

        
    }

    public function getSinglePostById($id){
        $sql = "SELECT * from post WHERE id = $id";
        $singlePost = $this->getData($this->conn, $sql, 1);

        return $this->postLoop($singlePost);

    }
}

?>