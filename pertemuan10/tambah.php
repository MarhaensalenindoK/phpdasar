<?php 
// Koneksi ke DBMS
require 'functions.php';


// cekkk
if(isset($_POST["submit"])){



	
	// ==PENTING NIH==
	// == CEK APAKAH DATA BERHASIL DI TAMBAHKAN ATAU TIDAK ==
	if(tambah($_POST) > 0){
		echo "<script>
		alert('DATA BERHASIL DITAMBAHKAN');
		document.location.href = 'index.php';
		</script>";
	}else{
		echo "<script>
		alert('DATA GAGAL DITAMBAHKAN');
		document.location.href = 'index.php';
		</script>";
	}

}


 ?>


<!DOCTYPE html>
<html>
<head>
	<title>ADD DATA MAHASISWA</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	<style type="text/css">
		.center{
			margin-left: 35%;
		}
	</style>
</head>
<body>
<h1 style="text-align: center;">ADD DATA MAHASISWA</h1>

<form action="" method="post">

	<div class="center">
		<div class="form-group mx-sm-5 mb-2">
	    <label for="nrp">NRP</label>
	    <input type="text" name="nrp" class="form-control" id="nrp"  placeholder="Enter NRP" style="width: 150px;" required>
	    
	  	</div>

		<div class="form-group mx-sm-5 mb-2">
	    <label for="nama">Name</label>
	    <input type="text" name="nama" class="form-control" id="nama"  placeholder="Enter Name" style="width: 300px;" required>
	    
	  	</div>


		<div class="form-group mx-sm-5 mb-2">
	    <label for="email">Email address</label>
	    <input type="text" name="email" class="form-control" id="email"  placeholder="Enter email" style="width: 300px;" required>

	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  	</div>


		<div class="form-group mx-sm-5 mb-2">
	    <label for="jurusan">Majors</label>
	    <input type="text" name="jurusan" class="form-control" id="jurusan"  placeholder="Enter Majors" style="width: 300px;" required>
	    
	  	</div>


		<div class="form-group mx-sm-5 mb-2">
	    <label for="gambar">Image</label>
	    <input type="text" name="gambar" class="form-control" id="gambar"  placeholder="Enter email" style="width: 300px;">
	    
	  	</div>

		
			<button type="submit"  class="btn btn-danger ml-5" name="submit">Submit</button>
		
	</div>
	


</form>


</body>
</html>