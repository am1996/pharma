<?php
    namespace Core;
    class Utils{
        public static function generateToken($len){
            $bytes = random_bytes($len);
            return bin2hex($bytes);
        }
        public static function hashpassword($password){
            return password_hash($password,PASSWORD_DEFAULT);
        }
        public static function checkpassword($password,$hash){
            return password_verify($password,$hash);
        }
        public static function loggedin(){
            if(isset($_SESSION["token"])) return true;
            else return false;
        }
    }
?>