<?php include("templates/header.php"); ?>
<!-- End Navbar -->
<!-- Konten -->
<div class="container mt-4 mb-4">
    <h3 class="text-center">Daftar Pelanggan Baru</h3>
    <form action="../controller/pelanggan.php" method="post">
        <div class="form-group">
            <label for="nama">Nama lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat">
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki">
                <label class="form-check-label" for="laki-laki">Laki-Laki</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan">
                <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
        </div>
        <div class="form-group">
            <label for="username_pelanggan">Username</label>
            <input type="text" class="form-control" name="username_pelanggan" id="username_pelanggan">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password_pelanggan" id="password_pelanggan">
        </div>
        <input type="submit" class="btn btn-primary" value="submit" name="submit">
        <input type="reset" class="btn btn-secondary" value="Reset" name="reset" />
    </form>
</div>
<!-- End konten -->
<?php include("templates/footer.php"); ?>