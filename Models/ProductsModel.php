<?php
  namespace Models;
  use \Core\ORM;
  class ProductsModel
  {
      private $orm;
      function __construct()
      {
        $this->orm = new ORM("products");
      }
      public function getProductByName($name){
        $name = mysqli_real_escape_string($this->orm->db,$name); //prevent sql injection
        $product = $this->orm->select("*")
                              ->where("lower(name) like '%$name%'")
                              ->execute();
        return $product;
      }
      public function getProductByID($id){
        $id = mysqli_real_escape_string($this->orm->db,$id);
        $product =  $this->orm->select("*")
                         ->where("id = $id")
                         ->execute()[0] ?? null;
        return $product;
      }
      public function getProductsOrderBy($orderby){
        $orderby = mysqli_real_escape_string($this->orm->db,$orderby);
        return $this->orm->select("*")
                         ->orderby($orderby)
                         ->execute();
      }
      public function getAllProducts(){
        return $this->orm->select("*")->execute();
      }
      public function getLimitProducts($limit){
        $limit = mysqli_real_escape_string($this->orm->db,$limit);
        return $this->orm->select("*")
                          ->limit($limit)
                          ->execute();
      }
      public function getProductsPrice($name){
        return $this->orm->select("price,sale_percent")
                          ->where("name = '$name'")
                          ->execute()[0];
      }
      public function getLastAdded($limit){
        $limit = mysqli_real_escape_string($this->orm->db,$limit);
        return $this->orm
                    ->select("*")
                    ->orderby("id DESC")
                    ->limit($limit)
                    ->execute();
      }

  }
?>