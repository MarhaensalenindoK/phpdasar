<?php
session_start();
require 'functions.php';
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id= $_COOKIE['id'];
	$key = $_COOKIE['key'];
	// AMBIL USERNAME BERDASARKAN ID
	$result = mysqli_query($conn,"SELECT username FROM user WHERE id= $id");
	$row = mysqli_num_rows($result);

	// CEK COOKIE DAN Username
	if ($key === hash('sha256',$row['username'])) {
		$_SESSION['login'] = true;

	}


}




if (isset($_COOKIE['login'])) {
	if ($_COOKIE['login'] == 'true') {
			$_SESSION['login'] = true;
	}
}

if (isset($_SESSION["login"])) {
	header("Location:index.php");
}



if (isset($_POST["login"])) {


	$username = $_POST["username"];
	$password = $_POST["password"];


	// CEK USERNAME GAN
	$result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");


	if (mysqli_num_rows($result) === 1) {
		// CEKK PASSWORD
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])){

			// SET TERLEBIH DAHULU SESIONNYA
			$_SESSION["login"] = true;



			// CEK REMEMBERME
			if (isset($_POST['remember'])) {
				// BUAT COOKIE
				setcookie('id',$row['id'],time()+60);
				setcookie('key',hash('sha256',$row['username']),time()+60);
			}


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


	 	<div class="form-check">
    	<input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
   		 <label class="form-check-label" for="exampleCheck1"  >Remeber me</label>
 		 </div>


	  	<button type="submit"  class="btn btn-danger  mt-3" name="login">LOGIN</button>




</form>

</div>

</body>
</html>
