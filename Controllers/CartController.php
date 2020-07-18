<?php

namespace Controllers;

class CartController extends \Core\Controller{
        private $model;

        function __construct(){
            $this->model = new \Models\ProductsModel();
        }
        public function get(){
            global $twig;
            $week = 7*24*3600;
            if($_SESSION["token"]){
                $cart = array_key_exists("cart",$_COOKIE) ? json_decode($_COOKIE["cart"],true) :array();
                if(!empty($_GET["id"])){
                    foreach($cart as $index => $item){
                        if($item["id"] == $_GET["id"]){
                            unset($cart[$index]);
                            $cart = json_encode($cart,JSON_FORCE_OBJECT);
                            setcookie("cart",$cart, time()+$week ,"/");
                            echo $twig->render("thankyou.html",[
                                "title"=>"Success",
                                "msg"=>"The item was removed from cart successfully"
                            ]);
                        }else{
                            echo $twig->render("thankyou.html",[
                                "title"=>"Error",
                                "msg"=>"Something went wrong"
                            ]);
                        }
                    }
                }else{
                    $totalprice = 0;
                    foreach($cart as $index => $item){
                        $data = $this->model->getProductsPrice($item["name"]);
                        $cart[$index]["price"] = $data["price"] * $data["sale_percent"];
                        $totalprice+=$cart[$index]["price"] * $cart[$index]["count"];
                    }
                    echo $twig->render("cart.html",[
                        "cart"=> $cart,
                        "totalprice"=>$totalprice
                    ]);
                    exit();
                }
            }else { 
                echo $twig->render("404.html");
                exit();
            }
        }
        public function post(){}

    }
?>