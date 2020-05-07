<?php 
    include "Crud.php";
    //include "authenticator.php";
    class User implements Crud{
    	private $id;
    	private $first_name;
    	private $last_name;
    	private $user_city;

        //private $username;
        //private $password;

    function __construct($first_name,$last_name,$user_city){
    	$this->first_name = $first_name;
    	$this->last_name = $last_name;
    	$this->user_city = $user_city;
        //$this->username = $username;
        //$this->password = $password;
    }

    /*public static function create(){
          $instance = new self();
          return $instance;
      }
      // username setter
      public function setUsername($username){
        $this->username = $username;
      }
      // username getter
      public function getUsername($username){
        return $this->username;
      }
      // password setter
      public function setPassword($password){
        $this->password = $password;
      }
      // password getter
      public function getPassword($password){
        return $this->password;
      }
    */

//id setter
    public function setId($id){
    	$this->id = $id;
    }
//id getter
    public function getId(){
    	return $this->id;
    }
//implementing the methods
    public function save($con){
    	$fn = $this->first_name;
    	$ln = $this->last_name;
    	$city = $this->user_city;
        //$uname = $this->username;
        //$this->hashPassword();
        //$pass = $this->password;
        //add stuff to query
    	$res = mysqli_query($con->conn, "INSERT INTO user(first_name,last_name,user_city) VALUES('$fn','$ln','$city')")or die("Error:" .mysqli_error($con->conn));
    	return $res;
    }
    public function readAll($dbcon){
        $query = "SELECT * FROM user";
        $result = mysqli_query($dbcon->conn, $query) or die("Error:" .mysqli_error($dbcon->conn));
        return $result;  
    }
    public function readUnique(){
    	return null;
    }
    public function search(){
    	return null;
    }
    public function update(){
    	return null;
    }
    public function removeOne(){
    	return null;
    }
    public function removeAll(){
    	return null;
    }
    //lab 2 implementations
    /*public function validateForm(){
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->user_city;

        if ($fn == "" || $ln == "" || $city == ""){
           return false;
        }
        return true;
    }
    public function createFormErrorSessions(){
        session_start();
        $_SESSION['form_errors'] = "All fields are required";
    }
    public function hashPassword(){
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
    }
    */
}
?>