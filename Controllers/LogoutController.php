<?php
namespace Controllers;

use Core\Controller;
use \Core\Routing;
use \Core\Registry;
class LogoutController extends Controller{
    private $model;
    function __construct(){}
    public function get(){
        session_unset();
        session_destroy();
        setcookie("token","",time()-10000);
        Routing::redirect(Registry::get("index"));
    }
    public function post(){}
}
?>