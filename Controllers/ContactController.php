<?php
    namespace Controllers;
    use \Core\Validator;
    class ContactController extends \Core\Controller{
        private $model;
        function __construct(){
            $this->model = new \Models\FeedbackModel();
        }
        public function get(){
            global $twig;
            echo $twig->render("contact.html");
        }
        public function post(){
            global $twig;
            $firstname = $_POST["firstname"] ;
            $lastname = $_POST["lastname"] ;
            $email = $_POST["email"];
            $subject = $_POST["subject"];
            $msg = $_POST["msg"];
            $validator = new Validator();
            $validation = $validator->validate($_POST,[
                'firstname'=>'anything',
                'lastname'=>'anything',
                'email'=>'email',
                'subject'=>'anything',
                'msg'=>'anything'
            ]);
            if(count($validation->errors)){
                echo $twig->render("thankyou.html",[
                    "title"=>"Error",
                    "errors"=> $validation->errors
                ]);
                exit();
            };
            $result = $this->model->addFeedback($firstname,$lastname,
                                                $email,$subject,$msg);
            if($result === 1) {
                echo $twig->render("thankyou.html",[
                    "title"=>"Success",
                    "msg"=>"Your message reached us and we will consider every word of it thanks you for reaching out to us!"
                ]);
            }else{
                echo $twig->render("thankyou.html",[
                    "title"=>"Error",
                    "msg"=>"Something went wrong!"
                ]);
            }
        }

    }

?>