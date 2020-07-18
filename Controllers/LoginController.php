<?php
namespace Controllers;

use Core\Routing;
use Core\Validator;
class LoginController extends \Core\Controller{
    private $model;
    function __construct(){
        $this->model = new \Models\UsersModel();
    }
    public function get(){
        Routing::redirect("/pharma/404");
    }
    public function post(){
        global $twig;
        $email = $_POST["email"];
        $password = $_POST["password"];
        $validator = new Validator();
        $validation = $validator->validate($_POST,[
            'email'=>'email',
            'password'=>'password'
        ]);
        if(count($validation->errors)){
            echo $twig->render("thankyou.html",[
                "title"=>"Error",
                "errors"=> $validation->errors
            ]);
            return;
        };
        switch($this->model->login($email,$password)){
            case 2:
                echo $twig->render("thankyou.html",[
                    "title"=>"Error",
                    "msg"=>"You are already logged in."
                ]);
                break;
            case 1:
                echo $twig->render("thankyou.html",[
                    "title"=>"Success",
                    "msg"=>"You are now logged in"
                ]);
                $this->model->changeToken();
                break;
            case 0:
                echo $twig->render("thankyou.html",[
                    "title"=>"Error",
                    "msg"=>"Wrong email or password"
                ]);
                break;
        }
    }
}
?>