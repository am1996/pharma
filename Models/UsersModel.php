<?php
  namespace Models;
  use \Core\ORM;
  use Exception;

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
        $password = mysqli_real_escape_string($this->orm->db,$password);
        if( $this->getUser($email) !== null ){
          return "<h1>Error: This user already exists!</h1>";
        }else {
          $this->orm->insert("fullname,email,password","'$fullname','$email','$password'");
          return 1;
        }
      }
      function getUser($email){
        $users = $this->orm->select("*")->where("email='$email'")->execute();
        if( !empty($users) ) return $users[0];
        else return null;
      }
  }
?>