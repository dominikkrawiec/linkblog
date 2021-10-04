<?php

class Post {
    public $id;
    public $title;
    public $content;
    public $link;
    public $uri;

    public function __construct($id, $title, $link, $content){
        $this->id = $id;
        $this->title = $title;
        $this->link = $link;
        $this->content = $content;
    }
}

?>