<?php

require('./Post.php');

class PostController extends Controller {
    private $conn;
    public $all;
    
    public function __construct(){
        $this->conn = $this->DbConnect();
        $this->$all = $this->getAll();
    }

    public function getAll(){
        $sql = 'SELECT * FROM posts';
        $posts = $this->getData($conn, $sql);

        while($row = $result->fetch_array()) {
            $posts[] = new Post(
                $row['id'],
                $row['title'],
                $row['link'],
                $row['content']
            );
        }

        return $posts;
    }
}

?>