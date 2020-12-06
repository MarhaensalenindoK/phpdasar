<?php 
// ============Koneksi ke database=========
$conn = mysqli_connect("localhost","root","","phpdasar");




function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rowss = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;

	}
	return $rows;
}


function tambah($data){
	global $conn;
	// AMBIL DATA DARI SETIAP ELEMEN DALAM FORM
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

	// QUERY INSERT DATA
	$query = "INSERT INTO mahasiswa VALUES('','$nama','$nrp','$email','$jurusan','$gambar')";


	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);


}


function hapus($id){

global $conn;
mysqli_query($conn,"DELETE FROM mahasiswa WHERE id = $id");
return mysqli_affected_rows($conn);
}



function ubah($data){
	global $conn;
// AMBIL DATA DARI SETIAP ELEMEN DALAM FORM
	$id = $data["id"];
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

	// QUERY INSERT DATA
	$query = "UPDATE mahasiswa SET nrp = '$nrp',nama = '$nama', email = '$email',jurusan = '$jurusan' ,gambar='$gambar' WHERE id = $id";


	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);




}


 ?>
