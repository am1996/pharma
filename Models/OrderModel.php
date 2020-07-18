<?php
namespace Models;
use \Core\ORM;
use \Core\Utils;
class OrderModel
{
  private $orm;
  function __construct()
  {
    $this->orm = new ORM("orders");
  }
  public function addOrder($order_content,$totalprice,$owner_id){
      $this->orm->insert("order_content,owner_id,totalprice","'$order_content',$owner_id,$totalprice");
      return 1;
  }
  public function getAllOrders($owner_id){
    return $this->orm->select("*")->execute();
  }
}
?>