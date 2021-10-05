<?php

require('./Post.php');

class PostController extends Controller {
    private $conn;
    public $all;
    
    public function __construct(){
        $this->conn = $this->DbConnect();
        $this->all = $this->getAll();
    }

    public function getAll(){
        $sql = "SELECT * FROM post";
        $posts = $this->getData($this->conn, $sql);
        $allPosts = [];

        while($row = mysqli_fetch_array($posts)) {
            
            $id = $row['id'];
            $title = $row['title'];
            $link = $row['link'];
            $content = $row['content'];

            array_push($allPosts, new Post($id, $title, $link, $content));

        }

        return $allPosts;
    }
}

?>