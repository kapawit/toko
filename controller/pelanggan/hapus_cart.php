<?php
include("../../database/koneksi.php");
$id_pemesanan = $_GET['id_pemesanan'];
$query = "DELETE FROM pemesanan WHERE id_pemesanan = $id_pemesanan";

mysqli_query($koneksi, $query);

header('location:../../index.php?pesan=hapus_cart');
