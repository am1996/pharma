<?php
    namespace Controllers;

    class StoreController extends \Core\Controller{
        private $model;
        function __construct(){
            $this->model = new \Models\ProductsModel();
        }
        public function get(){
            global $twig;
            $orderby = $_GET["orderby"] ?? "";
            switch($orderby){
                case "price,low2high":
                    $products = $this->model->getProductsOrderBy("price ASC");
                    break;
                case "price,high2low":
                    $products = $this->model->getProductsOrderBy("price DESC");
                    break;
                case "name,a2z":
                    $products = $this->model->getProductsOrderBy("name ASC");
                    break;
                case "name,z2a":
                    $products = $this->model->getProductsOrderBy("name DESC");
                    break;
                default:
                    $products = $this->model->getAllProducts();
            }
            echo $twig->render("store.html",array(
                "get" => $_GET,
                "products" => $products
            ));
        }
        public function post(){
            global $twig;
            $q = $_POST["q"] ?? null;
            if($q === null) $products = $this->model->getAllProducts();
            else $products = $this->model->getProductByName($q);
            echo $twig->render("store.html",array(
                "get" => $_GET,
                "products" => $products
            ));
        }

    }
?>