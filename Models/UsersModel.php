<?php
namespace Models;
use \Core\ORM;
use \Core\Utils;
class UsersModel
{
  private $orm;
  function __construct()
  {
    $this->orm = new ORM("users");
  }
  function addUser($fullname,$email,$password){
    $fullname = mysqli_real_escape_string($this->orm->db,$fullname);
    $email = mysqli_real_escape_string($this->orm->db,$email);
    $password = Utils::hashpassword($password);
    $token = Utils::generateToken(16);
    if( $this->getUser($email) !== null ){
      return "<h1>Error: This user already exists!</h1>";
    }else {
      $this->orm->insert("fullname,email,password,token","'$fullname','$email','$password','$token'");
      return 1;
    }
  }
  function login($email,$password){
    $email = mysqli_real_escape_string($this->orm->db,$email);
    $user = $this->getUser($email);
    if(Utils::loggedin()) return 2;
    if(Utils::checkpassword($password,$user["password"])){
      $_SESSION["token"] = $user["token"];
      $_SESSION["user_id"] = $user["id"];
      setcookie("token",$user["token"],time() + 86000 * 30);
      return 1;
    }else{ return 0;}
  }
  function getUser($email){
    $email = mysqli_real_escape_string($this->orm->db,$email);
    $users = $this->orm->select("*")->where("email='$email'")->execute();
    if( !empty($users) ) return $users[0];
    else return null;
  }
  function getUserByToken($token){
    $token = mysqli_real_escape_string($this->orm->db,$token);
    $users = $this->orm->select("*")->where("token='$token'")->execute();
    if( !empty($users) ) return $users[0];
    else return null;
  }
  function changeToken(){
    $token = Utils::generateToken(16);
    return $this->orm->set("token=$token","");
  }
}
?>