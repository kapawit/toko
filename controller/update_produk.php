<?php
        $id_produk = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];
        $warna = $_POST['warna'];
        $jumlah = $_POST['jumlah'];
        $merk = $_POST['merk'];
        $kategori = $_POST['kategori'];
        include_once("../database/koneksi.php");
        $a = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk', warna='$warna', jumlah=$jumlah, id_merk=$merk, id_kategori=$kategori WHERE id_produk = $id_produk");
        // Query string harus menggunakan petik satu ('')
        // Kecuali number tidak harus
        // Lebih aman dikasih petik satu('')
       header('location:../view/view_data.php');
    ?>