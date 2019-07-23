<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Toko</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <?php
    session_start();
    include_once("database/koneksi.php");
    $query_pelanggan = mysqli_query($koneksi, "SELECT pelanggan.id_pelanggan, pelanggan.nama_pelanggan from pelanggan");
    $query_produk = mysqli_query($koneksi, "SELECT produk.id_produk, produk.harga, produk.warna, produk.jumlah, produk.harga, produk.nama_produk, merk.nama_merk, kategori.nama_kategori
    FROM ((produk
    INNER JOIN merk ON produk.id_merk = merk.id_merk)
    INNER JOIN kategori ON produk.id_kategori = kategori.id_kategori) ORDER BY id_produk desc;");
    ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand p-2" href="#"><img src="assets/img/logo.png" width="70%"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active p-2">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active p-2">
                        <a class="nav-link" href="#">Profil</a>
                    </li>
                    <li class="nav-item active p-2">
                        <a class="nav-link" href="#">Berita</a>
                    </li>
                    <li class="nav-item active p-2">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item p-2">
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-success dropdown-toggle pl-3 pr-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (isset($_SESSION['status'])) {
                                    echo $_SESSION['nama_pelanggan'];
                                } else {
                                    echo "Masuk / Daftar";
                                } ?>
                            </button>
                            <div class="dropdown-menu">
                                <?php if (isset($_SESSION['status'])) {
                                    echo '<a class="dropdown-item pl-3 pr-3" href="controller/logout.php">Logout</a>';
                                } else {
                                    echo '<a class="dropdown-item pl-3 pr-3" href="view/login.php">Masuk</a>';
                                    echo '<a class="dropdown-item pl-3 pr-3" href="view/daftar_pelanggan.php">Daftar</a>';
                                } ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php if (isset($_SESSION['status'])) {
        include("view/templates/navbar_index.php");
    }
    ?>
    <!-- End Navbar -->
    <section>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">
                    <?php if (isset($_SESSION['nama_pelanggan'])) {
                        echo "Selamat datang " .  $_SESSION['nama_pelanggan'];
                    } else {
                        echo "DIGITALENT MART";
                    }
                    ?>
                </h1>
                <p class="lead">DIGITALENT MART</p>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <h2 class="text-center">Latest Product</h2>
            <h4 class="text-center"><?= date("Y/m/d"); ?></h4>
            <!-- Feedback -->
            <?php include("view/feedback/feedback.php"); ?>
            <!-- End Feedback -->
            <div class="row">
                <?php
                while ($produk = mysqli_fetch_array($query_produk)) {
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card m-2">
                            <img class="card-img-top" src="https://via.placeholder.com/60x40" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $produk['nama_produk']; ?></h5>
                                <hr>
                                <h6>Rp. <?php echo $produk['harga']; ?></h6>
                                <p class="card-text"><?php echo $produk['warna']; ?></p>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-block btn-success" href="controller/transaksi.php?id_produk=<?php echo $produk['id_produk']; ?>&harga=<?php echo $produk['harga']; ?>&id_pelanggan=<?php if (isset($_SESSION['id_pelanggan'])) {
                                                                                                                                                                                                            echo $_SESSION['id_pelanggan'];
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            echo "belum_login";
                                                                                                                                                                                                        }
                                                                                                                                                                                                        ?>">Beli</a>

                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.js"></script>
</body>

</html>