<?php
    session_start();
    //checks if the session is set, if not directs the user to login
    if(!isset($_SESSION['username'])){
    	header("Location:login.php");
    }
?>
<html>
	<head>
		<title>Private Page</title>
		<script type = "text/javascript" src = "validate.js"></script>
        <link rel = "stylesheet" type = "text/css" href = "validate.css">
	</head>
	<body>
		<p>This is a private page</p>
		<p>We want to protect it</p>
		<p><a href = "logout.php">LOG OUT</a></p>
	</body>
</html>