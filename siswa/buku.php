<?php
include "header.php";
global $conn;
?>

<div class="row" style="width: 90%; display:flex; justify-content: center; align-items: center; margin: 0 auto; ">
    <h2 style="margin-top: 30px;">Daftar Buku</h2>
    <?php
    include "koneksi.php";
    $qry_buku = mysqli_query($conn, "select * from buku");
    while ($dt_buku = mysqli_fetch_array($qry_buku)) {
        ?>
        <div class="col-md-3 mt-3">
            <div class="card">
                <img src="../foto_buku/<?= $dt_buku['foto'] ?>" class="card-img-top " width="305px" height="400px">
                <div class="card-body">
                    <h5 class="card-title"><?= $dt_buku['nama_buku'] ?></h5>
                    <p class="card-text "><?= substr($dt_buku['deskripsi'], 0, 200) ?></p>
                    <a href="pinjam_buku.php?id_buku=<?= $dt_buku['id_buku'] ?>" class="btn btn-secondary">Pinjam</a>
                    </tr>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
<?php
include "footer.php";
?>

