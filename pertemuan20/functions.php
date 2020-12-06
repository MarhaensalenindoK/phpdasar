<?php
// ============Koneksi ke database=========
$conn = mysqli_connect("localhost","root","","phpdasar");




function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
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
	// CEK NRP

	$result = mysqli_query($conn,"SELECT nrp FROM mahasiswa WHERE nrp = '$nrp'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('NRP yang dipilih sudah terdaftar');
				</script>";
				return false;
	}


	// MODIFIKASI UNTUK MENUPLOAD GAMBAR
	// UPLOAD GAMBAR TERLEBIH DAHULU
	$gambar = upload();
	if(!$gambar){
		// Fungsi kita berentikan
		return false;
	}

	// QUERY INSERT DATA
	$query = "INSERT INTO mahasiswa VALUES('','$nama','$nrp','$email','$jurusan','$gambar')";


	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);


}

// CARA MENGUPLOAD GAMBAR

function upload(){

	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];

	// CEK APAKAH TIDAK ADA GAMBAR YANG DI UPLOAD

	if($error === 4){
		echo "<script>
		alert('PILIH GAMBAR TERLEBIH DAHULU!');
			</script>";
			return false;
	}

	// CEK YANG DI UPLOAD ITU GAMBAR ATAU BUKAN
	$ekstensigambarvalid = ['jpg','jpeg','png'];
	// ini yang di upload user
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));
	if(!in_array($ekstensigambar, $ekstensigambarvalid)){
		echo "<script>
		alert('YANG ANDA UPLOAD BUKAN GAMBAR!');
			</script>";
			return false;
	}

	// CEK JIKA UKURAN GAMBAR TERLALU BESAR
	if($ukuranfile > 400000){
		echo "<script>
		alert('UKURAN GAMBAR TERLALU BESAR!');
			</script>";
			return false;
	}

	// INI KETIKA LOLOS PENGECEKAN
	// GENERATE NAMA GAMBAR BARU
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;
	move_uploaded_file($tmpname, 'img/'.$namafilebaru);
	return $namafilebaru;
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
	$gambarlama = htmlspecialchars($data["gambarlama"]);
	// CEK USER MEMILIH GAMBAR BARU ATAU TIDAK
	if($_FILES['gambar']['error'] === 4){
		$gambar = $gambarlama;
	}
	else{
		$gambar = upload();
	}




	// QUERY INSERT DATA
	$query = "UPDATE mahasiswa SET nrp = '$nrp',nama = '$nama', email = '$email',jurusan = '$jurusan' ,gambar='$gambar' WHERE id = $id";


	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);




}

function cari($keyword){
$query = "SELECT * FROM mahasiswa WHERE
 nama LIKE '%$keyword%' OR
 nrp LIKE '%$keyword%' OR
 email LIKE '%$keyword%' OR
 jurusan LIKE '%$keyword%'";

return query($query);

}

function registerasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$password2 = mysqli_real_escape_string($conn,$data["password2"]);

	// Cek username sudah ada atau belum
	$result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('Username yang dipilih sudah terdaftar');
				</script>";
				return false;
	}


	// CEK KONFIRMASI PASSWORD
	if ($password !== $password2) {
		echo "<script>
				alert('Konfirmasi password tidak sesuai!');
				</script>";

		return false;
	}
	// ENKRIPSI PASSWORD TERLEBIH DAHULU
	$password = password_hash($password, PASSWORD_DEFAULT);
	// TAMBAHKAN KE DATABASE
	mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");

	return mysqli_affected_rows($conn);
}




 ?>
