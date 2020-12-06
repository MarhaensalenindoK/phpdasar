<?php 
require 'functions.php';

if (isset ($_POST["register"])) {
		
	if(registerasi($_POST) > 0){
		echo " <script>
	alert('User baru berhasil ditambahkan')
	</script>;";




	}else{
		echo mysqli_error($conn);
	}



}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>REGISTERASI</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		.center{
			margin-left: 35%;
		}
		
	</style>
</head>
<body>

<h1 style="text-align: center;">REGISTERASI</h1>

<form action="" method="post">
	<div class="center">
	<div class="form-group mx-sm-5 mb-2">
	    <label for="username">USERNAME :</label>
	    <input type="text" name="username" class="form-control" id="nrp"  placeholder="Username..." style="width: 250px;" required>
	  	</div>

	  	<div class="form-group mx-sm-5 mb-2">
	    <label for="password">PASSWORD :</label>
	    <input type="password" name="password" class="form-control" id="nrp"  placeholder="Password..." style="width: 250px;" required>
	  	</div>

	  	<div class="form-group mx-sm-5 mb-2">
	    <label for="password2">CONFIRMASI PASSWORD :</label>
	    <input type="password" name="password2" class="form-control" id="nrp"  placeholder="Password..." style="width: 250px;" required>
	  	</div>

	  	<button type="submit"  class="btn btn-danger ml-5 mt-3" name="register">Submit</button>


</div>

</form>



</body>
</html>