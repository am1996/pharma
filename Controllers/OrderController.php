<?php
namespace Controllers;

use Core\Controller;

class OrderController extends Controller{
    private $model;
    public function __construct()
    {
        $this->model = new \Models\OrderModel();
    }
    public function get(){
        global $twig;
        if(array_key_exists("user_id",$_SESSION)){
            $owner_id = $_SESSION["user_id"];
            $orders = $this->model->getAllOrders($owner_id);
            echo $twig->render("orders.html",[
                "orders" => $orders
            ]);
        }else{
            $twig->http404("404.html");
        }
    }
    public function post(){
        global $twig;
        $order_content = $_POST["order"];
        $price = $_POST["totalprice"];
        $owner_id = $_SESSION["user_id"];
        if($this->model->addOrder($order_content,$price,$owner_id) == 1){
            setcookie("cart","",time()-10000,"/");
            echo $twig->render("thankyou.html",[
                "title"=>"Success",
                "msg"=>"Your order will be delivered in the next 3 days. Our agent will contact you."
            ]);
        }else{
            echo $twig->render("thankyou.html",[
                "title"=>"Error",
                "msg"=>"Unknown Error. Please hold while we check our system."
            ]);
        }
    }
}


?>