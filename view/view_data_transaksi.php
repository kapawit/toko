<?php include("templates/footer.php"); ?>
<?php
session_start();
include("../database/koneksi.php");
$query_transaksi = mysqli_query($koneksi, "SELECT transaksi.tanggal_transaksi, transaksi.id_produk, transaksi.total_transaksi, pelanggan.id_pelanggan, pelanggan.nama_pelanggan, merk.nama_merk, produk.id_merk, produk.nama_produk, merk.nama_merk, merk.id_merk
    FROM (((transaksi
    INNER JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan)
    INNER JOIN produk ON transaksi.id_produk = produk.id_produk) 
    INNER JOIN merk ON produk.id_merk = merk.id_merk) ORDER BY id_transaksi asc;");

?>
<!-- Konten -->
<div class="container mt-4 mb-4">
    <h1 class="text-center">View Data Transaksi</h1>
    <table class="table table-bordered" width="100%">
        <thead>
            <th width="10%">Tanggal</th>
            <th width="30%">Nama pelanggan</th>
            <th width="20%">Produk</th>
            <th width="10%">Merk</th>
            <th width="10%">Harga</th>
        </thead>
        <tbody>
            <?php
            while ($transaksi = mysqli_fetch_array($query_transaksi)) {
                echo "<tr>";
                echo "<td>" . $transaksi['tanggal_transaksi'] . "</td>";
                echo "<td>" . $transaksi['nama_pelanggan'] . "</td>";
                echo "<td>" . $transaksi['nama_produk'] . "</td>";
                echo "<td>" . $transaksi['nama_merk'] . "</td>";
                echo "<td>" . $transaksi['total_transaksi'] . "</td>";
                echo "<tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include("templates/footer.php"); ?>