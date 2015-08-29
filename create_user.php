<?php 
include ("admin/includes/init.php");

	if (isset($_POST['submit'])) {

		$user->username = trim($_POST['username']);
		$user->password = trim($_POST['password']);
		$user->first_name = trim($_POST['first_name']);
		$user->last_name = trim($_POST['last_name']);

		if ($user->create()){
			echo "the user has been successfully created.";
		}


	}


 ?>


<html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>

 </head>
 <body>
 	
	<form action="create_user.php" method="post">
		<label for="username">Username</label>
		<input type="text" name="username" size="30"><br>
		Password:<input type="password" name="password" size="30"><br>
		First_name:<input type="text" name="first_name" size="30"><br>
		Last_name:<input type="text" name="last_name" size="30"><br>
		<input type="submit" name="submit">

	</form>


 </body>
 	


 </html>