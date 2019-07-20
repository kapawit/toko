<?php include("templates/header.php"); ?>
<?php
session_start();
include("../database/koneksi.php");
$query_produk = mysqli_query($koneksi, "SELECT produk.id_produk, produk.jumlah, produk.nama_produk, merk.nama_merk, kategori.nama_kategori
    FROM ((produk
    INNER JOIN merk ON produk.id_merk = merk.id_merk)
    INNER JOIN kategori ON produk.id_kategori = kategori.id_kategori) ORDER BY id_produk asc;");
?>
<!-- Konten -->
<div class="container mt-4 mb-4">
    <h1 class="text-center">Data Barang</h1>
    <table class="table table-bordered" width="100%">
        <thead>
            <th width="10%">ID Produk</th>
            <th width="30%">Nama Produk</th>
            <th width="20%">Merk</th>
            <th width="10%">Kategori</th>
            <th width="10%">Jumlah</th>
            <th width="20%">Action</th>
        </thead>
        <tbody>
            <?php
            while ($produk = mysqli_fetch_array($query_produk)) {
                echo "<tr>";
                echo "<td>" . $produk['id_produk'] . "</td>";
                echo "<td>" . $produk['nama_produk'] . "</td>";
                echo "<td>" . $produk['nama_merk'] . "</td>";
                echo "<td>" . $produk['nama_kategori'] . "</td>";
                echo "<td>" . $produk['jumlah'] . "</td>";
                echo "<td><a class='btn btn-warning' href='edit_produk.php?id_produk={$produk['id_produk']}'>Edit</a>  <a href='../controller/hapus_produk.php?id_produk={$produk['id_produk']}' class='btn btn-danger'>Hapus</a></td>";
                echo "<tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include("templates/footer.php"); ?>