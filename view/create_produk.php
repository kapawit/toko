<!DOCTYPE html>
<html>

<head>
    <title>Toko</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <?php
    include("../database/koneksi.php");
    $query_merk = mysqli_query($koneksi, "SELECT * from merk");
    $query_kategori = mysqli_query($koneksi, "SELECT * from kategori");
    ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../assets/img/logo.png" width="60%"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active p-2">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="create_kategori_produk.php">Tambah Kategori</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="create_merk.php">Tambah Merk</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="create_produk.php">Tambah Produk</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="view_data.php">View Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Konten -->
    <div class="container mt-4 mb-4">
        <h3 class="text-center">Tambah Produk</h3>
        <form action="create_produk.php" method="post">
            <div class="form-group">
                <label for="nama_produk">Nama produk</label>
                <input type="text" class="form-control" name="nama_produk" id="nama_produk">
            </div>
            <div class="form-group">
                <label for="warna">Warna</label>
                <input type="text" class="form-control" name="warna" id="warna">
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" name="jumlah" id="jumlah">
            </div>
            <div class="form-group">
                <label for="merk">Merk</label>
                <select class="form-control" name="merk" id="merk">
                    <option value="" disabled selected>--- Pilih Merk ---</option>
                    <?php foreach ($query_merk as $key => $row) { ?>
                        <option value="<?php echo $row['id_merk'] ?>"><?php echo $row['nama_merk'] ?></option>
                    <?php
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="merk">Kategori</label>
                <select class="form-control" name="kategori" id="kategori">
                    <option value="" disabled selected>--- Pilih Kategori ---</option>
                    <?php foreach ($query_kategori as $key => $row) { ?>
                        <option value="<?php echo $row['id_kategori'] ?>"><?php echo $row['nama_kategori'] ?></option>
                    <?php
                    } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="submit" name="submit">
            <input type="reset" class="btn btn-secondary" value="Reset" name="reset" />
        </form>
    </div>
    <!-- End konten -->
    <?php
    if (isset($_POST['submit'])) {
        $nama_produk = $_POST['nama_produk'];
        $warna = $_POST['warna'];
        $jumlah = $_POST['jumlah'];
        $merk = $_POST['merk'];
        $kategori = $_POST['kategori'];
        include_once("../database/koneksi.php");
        mysqli_query($koneksi, "INSERT INTO produk(nama_produk,warna,jumlah,id_merk,id_kategori) VALUES('$nama_produk','$warna','$jumlah','$merk','$kategori')");
    }
    ?>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/popper.js"></script>
</body>

</html>