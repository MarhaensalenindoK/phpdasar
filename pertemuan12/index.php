<?php 
require 'functions.php';
// Kalian bisa mengurutkan menjadi yang terbaru dulu
// $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC" );

$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

if(isset($_POST["cari"])){

$mahasiswa = cari($_POST["keyword"]);

}



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		img{
			width: 50px;
		}

	</style>
</head>
<body>
<h1 style="text-align: center;">List Mahasiswa</h1>
<a href="tambah.php">add student data
</a>


<!-- ini search -->
<form action="" method="post">
  <div class="input-group mb-3 ml-3 mt-3" style="width: 300px;">
  <input type="text" name="keyword" class="form-control" placeholder="Search..."  aria-label="Recipient's username" aria-describedby="basic-addon2" autofocus autocomplete="off">

  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="cari">Search</button>
  </div>
</div>


</form>



<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Action</th>
      <th scope="col">Image</th>
      <th scope="col">NRP</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Majors</th>
    </tr>
  </thead>
  <tbody>

  	<?php $i=1; ?>
  	<?php foreach($mahasiswa as $row) : ?>

    <tr>
      <th scope="row"><?= $i; ?></th>
      <div class="buttontd">
      <td><a href="ubah.php?id=<?= $row["id"]; ?>" style="text-decoration: none; ">Edit</a> | <a href="hapus.php?id=<?= $row["id"]; ?>" style="text-decoration: none; " onclick="return confirm('yakin?')">Delete</a></td>
      </div>
      <td><img src="img/<?php echo $row["gambar"]; ?>"></td>
      <td><?= $row["nrp"]; ?></td>
      <td><?= $row["nama"]; ?></td>
      <td><?= $row["email"]; ?></td>
      <td><?= $row["jurusan"]; ?></td>
    </tr>

<?php $i++; ?>
<?php endforeach; ?>

</tbody>


</table>



</body>
</html>