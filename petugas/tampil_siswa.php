<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Siswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/stylesheet_tampil.css">
</head>
<body>
<?php
include "header_admin.php";
?>
<br><br>
<div class="container">
    <div class="card">
        <div class="card-header container">
            <h3 class="text-center mt-2 mb-3">Data Siswa<h3>
                    <form action="tampil_siswa.php" method="post" class="d-flex">
                        <input type="text" name="cari" class="form-control mb-3" placeholder="Masukkan keyword pencarian">
                        <button class="btn btn-outline-primary btn-default" type="submit">
                            Search
                        </button>
                    </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered fs-5 fw-light text-center" width="600px">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama kelas</th>
                    <th scope="col" width="250px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "../siswa/koneksi.php";
                global $conn;
                if (isset($_POST["cari"])) {
                    // jika ada keyword pencarian
                    $cari=$_POST['cari'];
                    $query_siswa= mysqli_query($conn,"select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas where siswa.id_siswa like '%$cari%' or siswa.nama_siswa like '%$cari%' or kelas.nama_kelas like '%$cari%'");
                }else{
                    //jika tidak ada keyword pencarian
                    $query_siswa= mysqli_query($conn,"select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas");
                }
                $no=0;
                while($data_siswa=mysqli_fetch_array($query_siswa)){
                    $no++;?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?php echo $data_siswa["nama_siswa"]; ?></td>
                        <td><?php echo $data_siswa["tgl_lahir"]; ?></td>
                        <td><?php echo $data_siswa["gender"]; ?></td>
                        <td><?php echo $data_siswa["alamat"]; ?></td>
                        <td><?php echo $data_siswa["username"]; ?></td>
                        <td><?php echo $data_siswa["nama_kelas"]; ?></td>
                        <td> <a href="ubah_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-success">Ubah</a>  <a href="hapus_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" onclick="return confirm ('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <a href="tambah_siswa.php" type="button" class="btn btn-primary">Tambah Siswa</a>
        </div>
    </div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>