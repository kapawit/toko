<?php

if (isset($_GET['submit'])) {
    $nama_kategori = $_GET['nama_kategori'];
    include_once("../database/koneksi.php");
    mysqli_query($koneksi, "INSERT INTO kategori(nama_kategori) VALUES('$nama_kategori')");
    header('location:../view/create_produk.php');
}
