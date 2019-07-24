<?php
include("../templates/header.php");
include("../../database/koneksi.php");
include("../templates/navbar.php");
if (isset($_SESSION['role'])) {
    if (($_SESSION['role']) == 'pelanggan') {
        include("../templates/navbar_pelanggan.php");
        $query_pemesanan = mysqli_query($koneksi, "SELECT pemesanan.id_pemesanan, pemesanan.id_pelanggan, pemesanan.jumlah, pemesanan.id_produk, pemesanan.jumlah, pemesanan.status, produk.nama_produk, produk.id_produk, merk.id_merk, merk.nama_merk
    FROM ((pemesanan
    INNER JOIN produk ON pemesanan.id_produk = produk.id_produk)
    INNER JOIN merk ON produk.id_merk = merk.id_merk) ORDER BY id_pemesanan asc;");
        ?>
        <!-- Konten -->
        <div class="container mt-4 mb-4">
            <h1 class="text-center">Data Pemesanan barang</h1>
            <table class="table table-bordered" width="100%">
                <thead>
                    <th width="30%">No Pemesanan</th>
                    <th width="30%">Nama Produk</th>
                    <th width="20%">Merk</th>
                    <th width="10%">Jumlah</th>
                    <th width="20%">Status</th>
                </thead>
                <tbody>
                    <?php
                    while ($pesan = mysqli_fetch_array($query_pemesanan)) {
                        echo "<tr>";
                        echo "<td>" . $pesan['id_pemesanan'] . "</td>";
                        echo "<td>" . $pesan['nama_produk'] . "</td>";
                        echo "<td>" . $pesan['nama_merk'] . "</td>";
                        echo "<td>" . $pesan['jumlah'] . "</td>";
                        echo "<td>" . $pesan['status'] . "</td>";
                        echo "<tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    } elseif (($_SESSION['role']) == 'pelanggan') {
        include("../templates/404.php");
    }
} else {
    header('location:../../view/home/login.php?pesan=belum_login');
}
?>
<?php include("../templates/footer.php"); ?>