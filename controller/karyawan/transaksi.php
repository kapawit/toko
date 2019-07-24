<?php
if (isset($_GET['id_pelanggan'])) {
    if ($_GET['id_pelanggan'] == "belum_login") {
        header('location:../../view/home/login.php?pesan=belum_login');
    } else {
        date_default_timezone_set("Asia/Bangkok");
        $id_produk = $_GET['id_produk'];
        $tgl_transaksi = date("Y-m-d");
        $harga = $_GET['harga'];
        $id_pelanggan = $_GET['id_pelanggan'];
        include_once("../../database/koneksi.php");
        mysqli_query($koneksi, "INSERT INTO transaksi(id_produk,tanggal_transaksi,total_transaksi,id_pelanggan) VALUES('$id_produk','$tgl_transaksi','$harga','$id_pelanggan')");
        // Query string harus menggunakan petik satu ('')
        // Kecuali number tidak harus
        // Lebih aman dikasih petik satu('')
        header('location:../../index.php?transaksi=sukses');
    }
}
