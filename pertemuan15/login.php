<?php 
require 'functions.php';
if (isset($_POST["login"])) {
	

	$username = $_POST["username"];
	$password = $_POST["password"];


	// CEK USERNAME GAN
	$result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");


	if (mysqli_num_rows($result) === 1) {
		// CEKK PASSWORD
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])){
			header("Location:index.php");
			exit;


		}
	}

	$error = true;
}



 ?>





<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		.center{
			margin-left: 35%;
		}
		
	</style>
</head>
<body>

<h1 style="text-align: center;">LOGIN</h1>
<div class="center">
<?php  if (isset($error)): ?>
	<p style="color: red; font-style: italic;">Username / password salah!</p>
<?php endif ?>

<form action="" method="post">
	
	<div class="form-group mx-sm-0 mb-2">
	    <label for="username">USERNAME :</label>
	    <input type="text" name="username" class="form-control" id="username"  placeholder="Username..." style="width: 250px;" required>
	  	</div>

	  	<div class="form-group mx-sm-0 mb-2">
	    <label for="password">PASSWORD :</label>
	    <input type="password" name="password" class="form-control" id="password"  placeholder="Password..." style="width: 250px;" required>
	  	</div>

	  

	  	<button type="submit"  class="btn btn-danger  mt-3" name="login">LOGIN</button>




</form>

</div>

</body>
</html>