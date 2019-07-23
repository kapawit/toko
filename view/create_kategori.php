<?php
if (isset($_SESSION['status'])) {
    include("templates/header.php");
    include("templates/navbar_user.php");
    include("templates/navbar_index.php");
    include("feedback/feedback.php"); ?>
    <!-- End Navbar -->
    <!-- Konten -->
    <div class="container mt-4 mb-4">
        <h3 class="text-center">Tambah Kategori</h3>
        <form action="../controller/kategori.php" method="post">
            <div class="form-group">
                <label for="nama_kategori">Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" id="kategori">
            </div>
            <input type="submit" class="btn btn-primary" name="submit">
            <input type="reset" class="btn btn-secondary" value="Reset" name="reset" />
        </form>
    </div>
    <!-- End konten -->
    <?php include("templates/footer.php"); ?>
<?php
} else {
    header('location:../view/login.php?pesan=belum_login');
}
?>