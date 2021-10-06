<?php


class Router {
    private $conn;

    public $type;
    public $id;
    public $slug;

    public function __construct(){
        $conn = new Controller();
        $this->conn = $conn->DbConnect();

        (isset($_GET['type'])) ? $this->type = $_GET['type'] : $this->type = false;
        (isset($_GET['id'])) ? $this->id = $_GET['id'] : $this->id = false;
        (isset($_GET['slug'])) ? $this->slug = $_GET['slug'] : $this->slug = false;
    }

    public function redirect(){
        
        if(!$this->type){
            header("Location: http://$host/linkblog/src/index.php?type=list",TRUE,301);
        } else {
            switch($this->type){
                case 'post':
                    $this->postRoute();
                    break;

                case 'list':
                    break;    
            }
        }
    }

    public function postRoute(){
        foreach($this as $key => $value){
            if(!$value){
                $sql = "SELECT * FROM $this->type WHERE id = $this->id";
        
                $data = mysqli_query($this->conn, $sql);

                while($row = mysqli_fetch_array($data)){
                    $this->slug = $row['uri'];
                }

                if($this->type && $this->id && $this->slug){
                    $host  = $_SERVER['HTTP_HOST'];
                    header("Location: ".DOMAIN."index.php?type=$this->type&id=$this->id&slug=$this->slug",TRUE,301);
                }
            }
        }
    }

}



?>

