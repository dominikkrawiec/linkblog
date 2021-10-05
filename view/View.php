<?php

    class View {
        public $templ;
        public $data;
        public $viewFile = '.view.php'; 

        public function __construct($temp, $data){
            $this->temp = $temp;
            $this->data = $data;

            $this->render($temp.$this->viewFile);
        }

        public function render($view){
            include($view);
        }

    }



?>