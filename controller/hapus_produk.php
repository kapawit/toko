<?php
include("../database/koneksi.php");
$id_produk = $_GET['id_produk'];
$query = "DELETE FROM produk WHERE id_produk = $id_produk";

mysqli_query($koneksi, $query);

header('location:../view/view_data.php');
