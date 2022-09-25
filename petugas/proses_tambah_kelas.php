<?php

include '../siswa/koneksi.php';
global $conn;
if($_POST){
    $nama_kelas=$_POST['nama_kelas'];
    $kelompok=$_POST['kelompok'];
    $walas=$_POST['walas'];
    if(empty($nama_kelas)){
        echo "<script>alert('nama kelas tidak boleh kosong');location.href='tambah_kelas.php';</script>";

    } elseif(empty($kelompok)){
        echo "<script>alert('kelompok tidak boleh kosong');location.href='tambah_kelas.php';</script>";
    }elseif(empty($walas)){
        echo "<script>alert('walas tidak boleh kosong');location.href='tambah_kelas.php';</script>";} 
    else {
        include "../siswa/koneksi.php";
        $insert=mysqli_query($conn,"insert into kelas (nama_kelas, kelompok, walas) value ('".$nama_kelas."','".$kelompok."','".$walas."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan kelas');location.href='tampil_kelas.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan kelas');location.href='tambah_kelas.php';</script>";
        }
    }
}
?>
