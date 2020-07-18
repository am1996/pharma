<?php
  namespace Models;
  use \Core\ORM;
  class FeedbackModel
  {
      private $orm;
      function __construct()
      {
        $this->orm = new ORM("feedback");
      }
      public function getFeedbackByEmail($email){
        $email = mysqli_real_escape_string($this->orm->db,$email); //prevent sql injection
        $result = $this->orm->select("*")
                              ->where("lower(name) like '%$email%'")
                              ->execute();
        return $result;
      }
      public function getFeedbackById($id){
        $id = mysqli_real_escape_string($this->orm->db,$id);
        $result =  $this->orm->select("*")
                         ->where("id = $id")
                         ->execute()[0] ?? null;
        return $result;
      }
      public function getFeedbackOrderBy($orderby){
        $orderby = mysqli_real_escape_string($this->orm->db,$orderby);
        return $this->orm->select("*")
                         ->orderby($orderby)
                         ->execute();
      }
      public function getAllFeedback(){
        return $this->orm->select("*")->execute();
      }
      public function getLimitFeedback($limit){
        $limit = mysqli_real_escape_string($this->orm->db,$limit);
        return $this->orm->select("*")
                          ->limit($limit)
                          ->execute();
      }
      public function getLastFeedback($limit){
        $limit = mysqli_real_escape_string($this->orm->db,$limit);
        return $this->orm
                    ->select("*")
                    ->orderby("id DESC")
                    ->limit($limit)
                    ->execute();
      }
      public function addFeedback($firstname,$lastname,$email,$subject,$msg){
          $firstname = mysqli_real_escape_string($this->orm->db,$firstname);
          $lastname = mysqli_real_escape_string($this->orm->db,$lastname);
          $email = mysqli_real_escape_string($this->orm->db,$email);
          $subject = mysqli_real_escape_string($this->orm->db,$subject);
          $msg = mysqli_real_escape_string($this->orm->db,$msg);
          $this->orm->insert("firstname,lastname,email,subject,msg","'$firstname','$lastname','$email','$subject','$msg'");
          return 1;
      }

  }
?>