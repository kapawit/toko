<?php
include("../templates/header.php");
include("../../database/koneksi.php");
include("../templates/navbar.php");
if (isset($_SESSION['role'])) {
    if (($_SESSION['role']) == 'karyawan') {
        include("../templates/navbar_karyawan.php");
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
                    <th width="10%">No Transaksi</th>
                    <th width="10%">Tanggal</th>
                    <th width="30%">Nama pelanggan</th>
                    <th width="20%">Produk</th>
                    <th width="10%">Merk</th>
                    <th width="10%">Harga</th>
                </thead>
                <tbody>
                    <?php
                    $no = 1; // untuk view data, nomor JANGAN DIAMBIL DARI DATABASE!!. 
                    foreach ($query_transaksi as $row) {
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['tanggal_transaksi']; ?></td>
                            <td><?= $row['nama_pelanggan']; ?></td>
                            <td><?= $row['nama_produk']; ?></td>
                            <td><?= $row['nama_merk']; ?></td>
                            <td><?= $row['total_transaksi']; ?></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="delete<?= $row['id_pendaftaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusdata" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3>
                                            <i class="fas fa-exclamation-circle"></i>
                                            Konfirmasi Hapus Data
                                        </h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger">
                                            Apakah anda yakin ingin menghapus data <h5><?= $row['nama']; ?> ?</h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                        <a class="btn btn-danger " href="../controller/delete.php?id_pendaftaran=<?= $row['id_pendaftaran']; ?>">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
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
    header('location:../view/home/login.php?pesan=belum_login');
}
?>
<?php include("../templates/footer.php"); ?>