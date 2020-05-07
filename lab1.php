<?php

include_once 'DBConnector.php';
include_once 'user.php';
$con = new DBConnector;

if(isset($_POST['save_btn'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_city = $_POST['user_city'];

//Creating a user object
    $user = new User($first_name,$last_name,$user_city);
    /*if(!$user->validateForm()){
          $user->createFormErrorSessions();
          header("Refresh:0");
          die();
      }*/
    $res = $user->save($con);

//Checking "save" operation success
    if($res){
        echo "Successful save";
    }else{
        echo "Error!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Page</title>
    <script type = "text/javascript" src = "validate.js"></script>
  </head>

<body>
    <form method = "post" name = "user_details" id = "user_details" onsubmit="return validateForm()" action = "<?=$_SERVER['PHP_SELF']?>">
       <table align = "center"> 
          <tr>
              <td><input type = "text" name = "first_name" placeholder = "First Name" required /></td>
          </tr>
          <tr>
              <td><input type = "text" name = "last_name" placeholder = "Last Name" required /></td>
          </tr>
          <tr>
              <td><input type = "text" name = "user_city" placeholder = "City" required /></td>
          </tr>
          <tr>
              <td><button type = "submit" name = "save_btn"><strong>SAVE</strong></button></td>
          </tr>
          <tr>
          <td><a href = "readAll.php"><input type = "button" value = "VIEW TABLE"> </a></td>
        </tr>
       </table> 
    </form>
    
</body>
</html>