<?php
    namespace Core;
    class Routing{

        public static function url($rUrl,$controller){
            $url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
            if(preg_match($rUrl,$url)){
                $controller->index($_SERVER['REQUEST_METHOD']);
                exit();
            }
        }
        public static function redirect($url){
            header("Location: $url");
        }
    }
?>