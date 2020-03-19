<?php
    namespace Controllers;
    class IndexController extends \Core\Controller{
        private $model;

        function __construct(){}
        public function get(){
            global $twig;
            $this->model = new \Models\ProductsModel();
            $only6 = $this->model->getLimitProducts(6);
            $last_added = $this->model->getLastAdded(4);
            echo $twig->render("index.html",array(
                "products"=> $only6,
                "lastAdded"=> $last_added
            ));
        }
        public function post(){
            //post code goes here
        }

    }
?>