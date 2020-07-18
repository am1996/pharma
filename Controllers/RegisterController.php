<?php
namespace Controllers;

use Core\Validator;
use Core\Routing;
class RegisterController extends \Core\Controller{
        private $model;
        function __construct(){
            $this->model = new \Models\UsersModel();
        }
        public function get(){
            Routing::redirect("/pharma/404");
        }
        public function post(){
            global $twig;
            $fullname = $_POST["fullname"] ;
            $email = $_POST["email"];
            $password = $_POST["password"];
            $validator = new Validator();
            $validation = $validator->validate($_POST,[
                'email'=>'email',
                'fullname'=>'fullname',
                'password'=>'password',
                'password2'=>'equals:password'
            ]);
            if(count($validation->errors)){
                echo $twig->render("thankyou.html",[
                    "title"=>"Error",
                    "errors"=> $validation->errors
                ]);
            };
            $result = $this->model->addUser($fullname,$email,$password);
            if($result === 1) {
                echo $twig->render("thankyou.html",[
                    "title"=>"Success",
                    "msg"=>"You are now a registered user please verify your email!"
                ]);
            }else{
                echo $twig->render("thankyou.html",[
                    "title"=>"Error",
                    "msg"=>"This user is already registered!"
                ]);
            }
        }

    }
?>