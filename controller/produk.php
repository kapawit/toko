<?php
session_start();
if (isset($_POST['submit'])) {
    $nama_produk = $_POST['nama_produk'];
    $warna = $_POST['warna'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $merk = $_POST['merk'];
    $kategori = $_POST['kategori'];
    include_once("../database/koneksi.php");
    mysqli_query($koneksi, "INSERT INTO produk(nama_produk,warna,jumlah,harga,id_merk,id_kategori) VALUES('$nama_produk','$warna','$jumlah','$harga','$merk','$kategori')");
    header('location:../index.php');
}
