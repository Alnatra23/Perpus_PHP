<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Peminjaman Buku</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<?php
include "header_admin.php";
include "../siswa/koneksi.php";
global $conn;
$qry_get_detail=mysqli_query($conn, "select * from detail_peminjaman_buku where id_detail_peminjaman_buku ='".$_GET['id_detail_peminjaman_buku']."'");
$dt_detail=mysqli_fetch_array($qry_get_detail);
?>
<br></br>
<div class="container">
    <div class="row content">
        <div class="col-md-6 mb-3">
            <img src="../foto_buku/detail_peminjaman_buku-01.png" class="image-fluid" alt="image" width="100%" height="100%"/>
        </div>
        <div class="col-md-6">
            <h3 class="mb-2 text-center"> Ubah Detail Peminjaman Buku</h3>
            <form action="proses_ubah_detail.php" method="POST">
                <input type="hidden" name="id_detail_peminjaman_buku" value="<?=$dt_detail ['id_detail_peminjaman_buku'] ?>">
                <div class="mb-4">
                    <!-- Siswa -->
                    <div class="mb-2">
                        <label class="form-label">Siswa :</label>
                        <select name="id_peminjaman_buku" class="form-control form">
                            <option></option>
                            <?php
                            include "../siswa/koneksi.php";
                            $qry_siswa=mysqli_query($conn,"select * from siswa");
                            while($data_siswa=mysqli_fetch_array($qry_siswa)){
                                if($data_siswa['id_siswa']==$dt_detail['id_peminjaman_buku']) {
                                    $selek="selected";
                                }else{
                                    $selek="";
                                }
                                echo '<option value="'.$data_siswa['id_siswa'].'"'.$selek.'>'.$data_siswa['nama_siswa'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <!-- buku -->
                    <div class="mb-2">
                        <label class="form-label">Buku :</label>
                        <select name="id_buku" class="form-control form">
                            <option></option>
                            <?php
                            include "../siswa/koneksi.php";
                            $qry_buku=mysqli_query($conn,"select * from buku");
                            while($data_buku=mysqli_fetch_array($qry_buku)){
                                if($data_buku['id_buku']==$dt_detail['id_buku']) {
                                    $selek="selected";
                                }else{
                                    $selek="";
                                }
                                echo '<option value="'.$data_buku['id_buku'].'"'.$selek.'>'.$data_buku['nama_buku'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Jumlah -->
                    <div class="mb-2">
                        <label class="form-label">Jumlah :</label>
                        <input type="number" name="qty" class="form-control form" value="<?=$dt_detail ['id_detail_peminjaman_buku'] ?>" placeholder="Masukkan Jumlah" required>
                    </div>
                </div>
                <input type = "submit" name ="simpan" value ="Ubah" class = "btn btn-primary">
            </form>
        </div>
    </div>

</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>