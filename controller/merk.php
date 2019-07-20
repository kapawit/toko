<?php
if (isset($_POST['submit'])) {
    $nama_merk = $_POST['nama_merk'];
    include_once("../database/koneksi.php"); //include koneksi database
    mysqli_query($koneksi, "INSERT INTO merk(nama_merk) VALUES('$nama_merk')");
    header('location:../view/create_produk.php'); // redirect ke halaman create produk

}
