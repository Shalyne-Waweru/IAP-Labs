<?php

include_once 'DBConnector.php';
include_once 'user.php';
$con = new DBConnector;

if(isset($_POST['login_btn'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
    //Accessing the static method using the class name
	$instance = User::create();
	$instance->setUsername($username);  
    $instance->setPassword($password);

	if($instance->isPasswordCorrect($con->conn)){
		$instance->login($con->conn);
		//closing the database connection
		$con->closeDatabase();
		//create a user session
		$instance->createUserSession();
	}else{

		$con->closeDatabase();
		header("Location:login.php");
	}
}
?>
<html>
    <head>
    	<title>Login Page</title>
    	<script type = "text/javascript" src = "validate.js"></script>
        <link rel = "stylesheet" type = "text/css" href = "validate.css">
    </head>
    <body>
    	<!---'=$_SERVER['PHP_SELF']' means that we're submitting this form to itself for processing --->
    	<form method = "post" name = "login" id = "login" action = "<?=$_SERVER['PHP_SELF']?>">
    		<table align = "center">
    			<tr>
    				<td><input type = "text" name = "username" placeholder = "Username" required /></td>
                </tr>
                <tr>
                	<td><input type = "password" name = "password" placeholder = "Password" required /></td>
                </tr>
                <tr>
                	<td><button type = "submit" name = "login_btn"><strong>LOGIN</strong></button></td>
                </tr>
    		</table>
    	</form>

    </body>
</html>