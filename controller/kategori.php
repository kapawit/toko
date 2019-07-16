<?php

if (isset($_POST['submit'])) {
    $nama_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    include_once("../database/koneksi.php");

    mysqli_query($koneksi, "INSERT INTO kategori(id_kategori,nama_kategori) VALUES('$id_kategori','$nama_kategori')");

    // header("location:daftar_barang.php");
}
