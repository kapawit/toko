<?php
$id_pelanggan = $_SESSION['id_pelanggan'];
$query_pemesanan = mysqli_query($koneksi, "SELECT pemesanan.id_pemesanan, pemesanan.id_pelanggan, pemesanan.jumlah, pemesanan.id_produk, pemesanan.status, produk.nama_produk, produk.id_produk, merk.id_merk, merk.nama_merk, pelanggan.id_pelanggan
FROM (((pemesanan
INNER JOIN produk ON pemesanan.id_produk = produk.id_produk)
INNER JOIN pelanggan ON pemesanan.id_pelanggan = pelanggan.id_pelanggan)
INNER JOIN merk ON produk.id_merk = merk.id_merk) 
WHERE pemesanan.id_pelanggan=$id_pelanggan");
$cek = mysqli_num_rows($query_pemesanan);
