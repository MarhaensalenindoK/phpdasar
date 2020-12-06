<?php 
// ============Koneksi ke database=========
$conn = mysqli_connect("localhost","root","","phpdasar");

// =========Ambil data dari tabel mahasiswa / query ====
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// =======Ambil data(fetch) mahasiswa dari object result======
// mysqli_fetch_row() ===> Array numerik
// mysqli_fetch_assoc() ===> Array associative
// mysqli_fetch_array() ===> Array Numerik dan Associative
// mysqli_fetch_object()
// ======CARA NGELUARIN DATANYA======
// while ($mhs = mysqli_fetch_assoc($result)){

// var_dump($mhs["nama"]);

// } 

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
<h1>Daftar Mahasiswa</h1>

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
  	<?php while($row = mysqli_fetch_assoc($result)) : ?>
  		
    <tr>
      <th scope="row"><?= $i; ?></th>
      <div class="buttontd">
      <td><a href="" style="text-decoration: none; ">Edit</a> | <a href="" style="text-decoration: none; ">Delete</a></td>
      </div>
      <td><img src="img/<?php echo $row["gambar"]; ?>"></td>
      <td><?= $row["nrp"]; ?></td>
      <td><?php $row["nama"] ?></td>
      <td><?= $row["email"]; ?></td>
      <td><?= $row["jurusan"]; ?></td>
    </tr>

<?php $i++; ?>
<?php endwhile; ?>

</tbody>


</table>



</body>
</html>