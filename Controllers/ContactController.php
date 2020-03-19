<?php
    namespace Controllers;

    class ContactController extends \Core\Controller{
        function __construct(){}
        public function get(){
            global $twig;
            echo $twig->render("contact.html");
        }
        public function post(){
            echo $_POST["firstname"];
        }

    }
?>