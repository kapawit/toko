<?php
if (isset($_POST['submit'])) {
    $nama_kategori = $_POST['nama_kategori'];
    include_once("../../database/koneksi.php");
    mysqli_query($koneksi, "INSERT INTO kategori(nama_kategori) VALUES('$nama_kategori')");
    header('location:../../view/karyawan/create_produk.php');
}
