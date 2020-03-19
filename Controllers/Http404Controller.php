<?php
    namespace Controllers;
    
    class Http404Controller extends \Core\Controller{
        private $model;

        function __construct(){}
        public function get(){
            global $twig;
            echo $twig->render("404.html");
        }
        public function post(){
            //post code goes here
        }

    }
?>