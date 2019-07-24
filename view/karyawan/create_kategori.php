<?php
include("../templates/header.php");
include("../../database/koneksi.php");
include("../templates/navbar.php");
if (isset($_SESSION['role'])) {
    if (($_SESSION['role']) == 'karyawan') {
        include("../templates/navbar_karyawan.php");
        ?>
        <!-- Konten -->
        <div class="container mt-4 mb-4">
            <h3 class="text-center">Tambah Kategori</h3>
            <form action="../../controller/karyawan/kategori.php" method="post">
                <div class="form-group">
                    <label for="nama_kategori">Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" id="kategori">
                </div>
                <input type="submit" class="btn btn-primary" name="submit">
                <input type="reset" class="btn btn-secondary" value="Reset" name="reset" />
            </form>
        </div>
        <!-- End konten -->
    <?php
    } elseif (($_SESSION['role']) == 'pelanggan') {
        include("../templates/404.php");
    }
} else {
    header('location:../view/home/login.php?pesan=belum_login');
}
?>
<?php include("../templates/footer.php"); ?>