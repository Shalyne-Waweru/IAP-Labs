<?php

include_once 'DBConnector.php';
include_once 'user.php';
include_once 'fileUploader.php';

$con = new DBConnector; //Creating a database connection


if(isset($_POST['save_btn'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_city = $_POST['user_city'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $utc_timestamp = $_POST['utc_timestamp'];
    $offset = $_POST['time_zone_offset'];
    
    //Creating a user object
    $user = new User($first_name,$last_name,$user_city,$username,$password);
    //calls the "validateForm()" method if it returns false creates and calls the "createFormErrorSessions()" method
    $uploader = new FileUploader();
    if(!$user->validateForm()){
          $user->createFormErrorSessions();
          header("Refresh:0");
          die();
    } else if($user->isUserExist($con->conn)){
        $user->createFormErrorSessions();
        $_SESSION['form_errors'] = "Username already exists!";
        header("Refresh:0");
        die();
    }
    $res = $user->save($con->conn);

    $file_upload_response = $uploader->uploadFile($_FILES['fileToUpload']);


    //Checking "save" operation success
    if ($res && $file_upload_response) {
        echo "Successful save";
    } else if(!$file_upload_response && empty($_SESSION['form_errors'])){
        $_SESSION['form_errors'] = "Unsuccessful file upload";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Page</title>
    <!-- 2.Include the js and css files-->
    <script type = "text/javascript" src = "validate.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "validate.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src="timezone.js"></script>
  </head>

<body>
    <!-- 3.Calling the js function when the form is submitted-->
    <form method = "post" name = "user_details" id = "user_details" enctype="multipart/form-data" onsubmit="return validateForm()" action = "<?=$_SERVER['PHP_SELF']?>">
       <table align = "center"> 
          <tr>
              <td>
                <div id = "form-errors">
                  <!-- 4.Server side validation -->
                  <?php
                      //checks if the "form-errors" is not empty thus (has the stmt) meaning there's an empty field
                      if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                      if (!empty($_SESSION['form_errors'])) {
                          echo " " . $_SESSION['form_errors'];
                          unset($_SESSION['form_errors']);
                      }

                  ?>
                </div>
              </td>
          </tr>
          <tr>
              <td><input type = "text" name = "first_name" placeholder = "First Name" required /></td>
          </tr>
          <tr>
              <td><input type = "text" name = "last_name" placeholder = "Last Name" /></td>
          </tr>
          <tr>
              <td><input type = "text" name = "user_city" placeholder = "City" /></td>
          </tr>
          <tr>
              <td><input type = "text" name = "username" placeholder = "Username" /></td>
          </tr>
          <tr>
              <td><input type = "password" name = "password" placeholder = "Password" /></td>
          </tr>
          <tr>
              <td>Profile image:<input type="file" name="fileToUpload" id="fileToUpload" required></td>
          </tr>
          <tr>
              <td><button type = "submit" name = "save_btn"><strong>SAVE</strong></button></td>
          </tr>

          <!--
          <input type="hidden" name="utc_timestamp" id="utc_timestamp" value="">

          <input type="hidden" name="time_zone_offset" id="time_zone_offset" value="">
          -->

          <tr>
              <td><a href="login.php">LOGIN</a></td>
          </tr>
          <tr>
              <td><a href = "readAll.php"><input type = "button" value = "VIEW TABLE"> </a></td>
          </tr>
       </table> 
    </form>
    
</body>
</html>