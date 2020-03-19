<?php
    namespace Controllers;
    
    class AboutController extends \Core\Controller{
        private $model;

        function __construct(){}
        public function get(){
            global $twig;
            echo $twig->render("about.html");
        }
        public function post(){
            //post code goes here
        }

    }
?>