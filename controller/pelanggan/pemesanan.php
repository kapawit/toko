<?php
$id_produk = $_GET['id_produk'];
$id = $_GET['id'];
$jumlah = $_GET['jumlah'];
if (isset($_GET['id'])) {
    if ($_GET['id'] == "belum_login") {
        header('location:../../view/login.php?pesan=belum_login');
    } else if ($_GET['id'] == "login_karyawan") {
        header('location:../../view/login.php?pesan=login_karyawan');
    } else {
        include_once("../../database/koneksi.php");
        mysqli_query($koneksi, "INSERT INTO pemesanan(id_produk,id_pelanggan,jumlah) VALUES('$id_produk','$id','$jumlah')");
        // Query string harus menggunakan petik satu ('')
        // Kecuali number tidak harus
        // Lebih aman dikasih petik satu('')
        header('location:../../index.php');
    }
}
