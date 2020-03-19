<?php

namespace Controllers;
class ProductController extends \Core\Controller{
        private $model;

        function __construct(){}
        public function get(){
            global $twig;
            $this->model = new \Models\ProductsModel();
            $url = explode("/",$_SERVER["PATH_INFO"]);
            $product_id = end($url) ?? null;
            $product = $this->model->getProductByID($product_id);
            echo $twig->render("product.html",array(
                "product" => $product
            ));
        }
        public function post(){
            //post code goes here
        }

    }
?>