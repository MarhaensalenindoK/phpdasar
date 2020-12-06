<?php

require '../functions.php';



$keyword = $_GET["keyword"];
$query =
"SELECT * FROM mahasiswa WHERE
 nama LIKE '%$keyword%' OR
 nrp LIKE '%$keyword%' OR
 email LIKE '%$keyword%' OR
 jurusan LIKE '%$keyword%'";


$mahasiswa = query($query);

?>
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
        <!-- INI UNTUK MENGELUARKAN / MENAMPILKAN DATA -->
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>

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
