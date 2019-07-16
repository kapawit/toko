<?php

if (isset($_POST['submit'])) {
    $merk = $_POST['merk'];
    $warna = $_POST['warna'];
    $jumlah = $_POST['jumlah'];
    $merk = $_POST['merk'];
    $id_kategori = $_POST['id_kategori'];

    include_once("../database/koneksi.php");

    mysqli_query($koneksi, "INSERT INTO produk(merk,warna,jumlah.merk,id_kategori) VALUES('$mermerkek','$warna','$jumlah','$merk','$id_kategori')");

    // header("location:daftar_barang.php");
}
