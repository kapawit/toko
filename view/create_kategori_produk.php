<!DOCTYPE html>
<html>

<head>
    <title>Toko</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
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
                        <a class="nav-link" href="create_produk.php">Tambah produk</a>
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
        <h3 class="text-center">Tambah Kategori</h3>
        <form action="create_kategori_produk.php" method="post">
            <div class="form-group">
                <label for="nama_kategori">Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" id="kategori">
            </div>
            <input type="submit" class="btn btn-primary" name="submit">
        </form>
    </div>
    <!-- End konten -->
    <?php

    if (isset($_POST['submit'])) {
        $nama_kategori = $_POST['nama_kategori'];
        include_once("../database/koneksi.php");
        mysqli_query($koneksi, "INSERT INTO kategori(nama_kategori) VALUES('$nama_kategori')");
        // header("location:view.php");
    } ?>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/popper.js"></script>
</body>

</html>