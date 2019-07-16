<!DOCTYPE html>
<html>

<head>
    <title>Toko</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.png" width="60%"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active p-2">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="view/create_kategori_produk.php">Tambah Kategori</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="view/create_merk.php">Tambah Merk</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="view/create_produk.php">Tambah produk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- jumbotron -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
    <!-- End Jumbotron -->
    <!-- Konten -->
    <div class="container mt-4 mb-4">
        <h3>test</h3>
    </div>
    <!-- End konten -->
    <?php

    if (isset($_POST['submit'])) {
        $merek = $_POST['nama_merek'];
        $warna = $_POST['warna'];
        $jumlah = $_POST['jumlah'];

        include_once("controller/koneksi.php");

        mysqli_query($koneksi, "INSERT INTO printer(nama_merek,warna,jumlah) VALUES('$merek','$warna','$jumlah')");

        header("location:daftar_barang.php");
    }
    ?>
    <!-- End Konten -->







    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.js"></script>
</body>

</html>