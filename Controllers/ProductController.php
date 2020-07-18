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
            global $twig;
            $week = 7*24*3600;
            $count = $_POST["count"];
            $name = $_POST["name"];
            $item = array(
                "id"=> \Core\Utils::generateToken(5),
                "name"=>$name,
                "count"=>$count
            );

            //serializing and deserializing to add to cart
            if( empty($_COOKIE["cart"]) ) $cart = array();
            else $cart = json_decode($_COOKIE["cart"],true);
            array_push($cart,$item);
            $cart = json_encode($cart,JSON_FORCE_OBJECT);
            setcookie("cart",$cart, time()+$week ,"/");
            echo $twig->render("thankyou.html",[
                "title"=>"Success",
                "msg"=>"Successfully added to cart!"
            ]);
        }

    }
?>