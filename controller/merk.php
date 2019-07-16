<?php
$nama_merk = $_POST['nama_merk'];

if (isset($_POST['submit'])) {
    include_once("../database/koneksi.php");
    mysqli_query($koneksi, "INSERT INTO produk(nama_merk) VALUES('$nama_merk')");

    // header("location:daftar_barang.php");
}
