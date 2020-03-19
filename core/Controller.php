<?php
    //decorator design pattern
    namespace Core;
    abstract class Controller{
        public function __construct(){}
        public function index($req){
            if($req === "GET"){
                $this->get();
            }elseif($req === "POST"){
                $this->post();
            }
        }
        public abstract function get();
        public abstract function post();
    }
?>