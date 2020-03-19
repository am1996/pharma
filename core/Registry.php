<?php
//registry design pattern
namespace Core;
class Registry{
    private static $data = array();
    public static function set($key,$value){
        self::$data[$key] = $value;
    }
    public static function get($key){
        return isset(self::$data[$key]) ? self::$data[$key] : null;
    }
    public static function remove($key){
        unset(self::$data[$key]);
    }
}
Registry::set("host","localhost");
Registry::set("username","root");
Registry::set("password","");
Registry::set("index","/pharma");
Registry::set("dbname","pharma");
?>