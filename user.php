<?php
  include "Crud.php";
  //8. Include the file to implement its methods
  include "authenticator.php";

  class User implements Crud, Authenticator
  {

    private $id;
    private $first_name;
    private $last_name;
    private $user_city;
    //9. Add new variables
    private $username;
    private $password;

    //10. Initializing the new variables since they are private and can't be initialized elsewhere
    function __construct($first_name, $last_name, $user_city, $username, $password)
    {
      $this->first_name = $first_name;
      $this->last_name = $last_name;
      $this->user_city = $user_city;
      $this->username = $username;
      $this->password = $password;
    }
    //11. Static constructor
    public static function create()
    {
      $instance = new self($first_name="",$last_name="",$user_city="",$username="",$password="");
      return $instance;
    }

    //12. Adding username and password setters and getters
    //username setter
    public function setUsername($username)
    {
      $this->username = $username;
    }
    //username getter
    public function getUsername()
    {
      return $this->username;
    }
    //password setter
    public function setPassword($password)
    {
      $this->password = $password;
    }
    //password getter
    public function getPassword()
    {
      return $this->password;
    }

    //id setter
    public function setId($id)
    {
      $this->id = $id;
    }
    //id getter
    public function getId()
    {
      return $this->id;
    }

    public function isUserExist($con)
    {
        $res = $con->query("SELECT * FROM user WHERE username = '$this->username' LIMIT 1");
        return $res->num_rows > 0;
    }


    //13. Making changes
    public function save($con)
    {
      $fn = $this->first_name;
      $ln = $this->last_name;
      $city = $this->user_city;
      $uname = $this->username;
      $this->hashPassword();
      $pass = $this->password;

      $res = mysqli_query($con,"INSERT INTO user(first_name,last_name,user_city,username,password) VALUES('$fn','$ln','$city','$uname','$pass')") or die("Error: ". mysqli_error($con));

      return $res;
    }

    public function readAll($con)
    {
      $result = mysqli_query($con->conn,"SELECT * FROM user") or die("Error".mysqli_error($con->conn));
      return $result;
    }
    public function readUnique()
    {
      return null;
    }
    public function search()
    {
      return null;
    }
    public function update()
    {
      return null;
    }
    public function removeOne()
    {
      return null;
    }
    public function removeAll()
    {
      return null;
    }
    //lab 2 implementations
    // 6.Returns true if the values are not empty
    public function validateForm()
    {
      
      $fn = $this->first_name;
      $ln = $this->last_name;
      $city = $this->user_city;

      if ($fn == "" || $ln== "" || $city == "") {
        return false;
      }
      return true;
    }


    public function createFormErrorSessions()
    { 
      //For server validation
      session_start();
      $_SESSION['form-errors'] = "All fields are required.";
    }

    public function hashPassword()
    {
      $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function isPasswordCorrect($con)
    {
      $con = new DBConnector();
      $found = false;
      $res = mysqli_query($con->conn, "SELECT * FROM user") or die("Error: ".mysqli_error($con->conn));

      while ($row = $res->fetch_assoc()) {
        if (password_verify($this->getPassword(),$row['password']) && $this->getUsername() == $row['username']) {
              $found = true;
        }
      }

      $con->closeDatabase();
      return $found;
    }

    public function login($con)
    {
      if ($this->isPasswordCorrect($con)){
        header("Location:private_page.php");
      }
    }

    public function createUserSession(){
      session_start();
  $_SESSION['username']=$this->getUsername();
    }

    public function logout()
    {
      session_start();
      unset($_SESSION['username']);
      session_destroy();
      header("Location:lab1.php");
    }
  }

?>
