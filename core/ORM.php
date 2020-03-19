<?php
namespace Core;
use mysqli;
//mysql injection is prevented in the model
//mutator design pattern;
class ORM{
    public $db;
    private $query;
    private $tblname;
    public function __construct($tblname){
        $host = Registry::get("host");
        $username = Registry::get("username");
        $password = Registry::get("password");
        $dbname = Registry::get("dbname");
        $this->tblname = $tblname;
        $this->query = "";
        $this->db = new mysqli($host,$username,$password,$dbname);
        if ($this->db->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->db->connect_error;
        }
    }
    public function select($cols){
        $this->query = "SELECT $cols FROM $this->tblname";
        return $this;
    }
    public function where($cond){
        $this->query = "$this->query WHERE $cond";
        return $this;
    }
    public function limit($limiter){
        $this->query = "$this->query LIMIT $limiter";
        return $this;
    }
    public function orderby($col){
        $this->query = "$this->query ORDER BY $col";
        return $this;
    }
    public function execute(){
        return $this->db->query($this->query) ? 
        $this->db->query($this->query)->fetch_all(MYSQLI_ASSOC): 
        $this->db->error;
    }

    //CRUD
    public function insert($cols,$values){
        $query = "INSERT INTO $this->tblname ($cols) VALUES($values);";
        return $this->query($query);
    }
    //$data must equal (dat=val)
    public function set($data,$cond){
        return $this->query("UPDATE $this->tblname $data WHERE $cond");
    }
    public function delete($cond=""){
        if($cond===""){
            return $this->query("DELETE FROM $this->tblname");
        }else{
            return $this->query("DELETE FROM $this->tblname WHERE $cond");
        }
    }
    public function query($sql){
        return $this->db->query($sql) ? true : $this->db->error;
    }
}
?>