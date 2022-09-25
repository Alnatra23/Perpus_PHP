<?php
include "header_admin.php";
global $conn;
?>

<div class="row" style="width: 90%; display:flex; justify-content: center; align-items: center; margin: 0 auto; ">
    <h2 style="margin-top: 30px;">Data Buku</h2>
    <?php
    include "../siswa/koneksi.php";
//    $qry_buku=mysqli_query($conn,"select * from buku where id_buku = '".$_GET['id_buku']."'");
//    $dt_siswa=mysqli_fetch_array($qry_buku);
    $qry_buku = mysqli_query($conn, "select * from buku");
    while ($dt_buku = mysqli_fetch_array($qry_buku)) {
        ?>
        <div class="col-md-3 mt-3">
            <div class="card">
                <img src="../foto_buku/<?= $dt_buku['foto'] ?>" class="card-img-top " width="305px" height="400px">
                <div class="card-body">
                    <h5 class="card-title"><?= $dt_buku['nama_buku'] ?></h5>
                    <p class="card-text "><?= substr($dt_buku['deskripsi'], 0, 200) ?></p>
                    <a href="ubah_buku.php?id_buku=<?= $dt_buku['id_buku'] ?>" class="btn btn-primary">Ubah</a>
                    <a href="hapus_buku.php?id_buku=<?=$dt_buku['id_buku']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger ms-1">Hapus</a></td>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="mt-3">
        <a href="tambah_buku.php" class="btn btn-primary mb-5 ms-2">+ Tambah Buku</a>
    </div>
</div>
<?php
include "footer_admin.php";
?>

