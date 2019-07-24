<?php
include("../templates/header.php");
include("../../database/koneksi.php");
include("../templates/navbar.php");
if (isset($_SESSION['role'])) {
    if (($_SESSION['role']) == 'karyawan') {
        include("../templates/navbar_karyawan.php");
        $query_produk = mysqli_query($koneksi, "SELECT produk.id_produk, produk.jumlah, produk.nama_produk, merk.nama_merk, kategori.nama_kategori
    FROM ((produk
    INNER JOIN merk ON produk.id_merk = merk.id_merk)
    INNER JOIN kategori ON produk.id_kategori = kategori.id_kategori) ORDER BY id_produk asc;");
        ?>
        <!-- Konten -->
        <div class="container mt-4 mb-4">
            <h1 class="text-center">Data Produk</h1>
            <?php include("../feedback/feedback.php"); ?>
            <table class="table table-bordered" width="100%">
                <thead>
                    <th width="5%">No</th>
                    <th width="5%">ID Produk</th>
                    <th width="30%">Nama Produk</th>
                    <th width="20%">Merk</th>
                    <th width="10%">Kategori</th>
                    <th width="10%">Jumlah</th>
                    <th width="25%">Action</th>
                </thead>
                <tbody>
                    <?php
                    $no = 1; // untuk view data, nomor JANGAN DIAMBIL DARI DATABASE!!. 
                    foreach ($query_produk as $row) {
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['id_produk']; ?></td>
                            <td><?= $row['nama_produk']; ?></td>
                            <td><?= $row['nama_merk']; ?></td>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td><?= $row['jumlah']; ?></td>
                            <td>
                                <a class='btn btn-warning' href='edit_produk.php?id_produk=<?= $row['id_produk']; ?>'>Edit</a>
                                <a type='button' data-toggle='modal' data-target='#delete<?= $row['id_produk']; ?>' class='btn btn-danger'>Hapus</a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class=" modal fade" id="delete<?= $row['id_produk']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusdata" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3>
                                            <i class="fas fa-exclamation-circle"></i>
                                            Konfirmasi Hapus Produk
                                        </h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger">
                                            Apakah anda yakin ingin menghapus data Produk <h5><?= $row['nama_produk']; ?> ?</h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                        <a href='../../controller/karyawan/hapus_produk.php?id_produk=<?= $row['id_produk']; ?>' class='btn btn-danger'>Hapus</a>
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