<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Toko</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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
                        <a class="nav-link" href="http://localhost:8080/VSGA/toko">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="view/home/profil">Profil</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="view/home/berita.php">Berita</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="view/home/about.php">About Us</a>
                    </li>
                    <li class="nav-item p-2">
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle py-2 px-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (isset($_SESSION['role'])) {
                                    if (($_SESSION['role']) == 'pelanggan') {
                                        echo $_SESSION['nama_pelanggan'];
                                    } elseif (($_SESSION['role']) == 'karyawan') {
                                        echo $_SESSION['nama_karyawan'];
                                    }
                                } else {
                                    echo "Masuk / Daftar";
                                } ?>
                            </button>
                            <div class="dropdown-menu">
                                <?php if (isset($_SESSION['role'])) {
                                    echo '<a class="dropdown-item pl-3 pr-3" href="controller/auth/logout.php">Logout</a>';
                                } else {
                                    echo '<a class="dropdown-item pl-3 pr-3" href="view/home/login.php">Masuk</a>';
                                    echo '<a class="dropdown-item pl-3 pr-3" href="view/pelanggan/daftar_pelanggan.php">Daftar</a>';
                                } ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <?php
            if (isset($_SESSION['role'])) {
                if (($_SESSION['role']) == 'pelanggan') { 
                include("controller/pelanggan/cart.php");?>
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#cart">
                        <i class="fa fa-2x fa-shopping-cart"></i>
                        <span class="badge badge-pill badge-info"><?= $cek?></span>
                    </a>
                    <?php include("view/pelanggan/view_cart.php"); ?>
                <?php
                } elseif (($_SESSION['role']) == 'karyawan') { ?>
                    <a class="nav-link btn btn-outline-success" href="view/karyawan/view_data.php">
                    <i class="fa fa-arrow-right"></i>
                    </a>
                <?php
                }
            }
            ?>
        </div>
    </nav>
    <!-- End Navbar -->
    <section>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/img/carousel/slide1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/carousel/slide2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/carousel/slide3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <!-- Produk -->
    <section>
        <div class="container my-4">
            <h2 class="text-center">Latest Product</h2>
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
                            <div class="card-footer">
                                <a class="btn btn-block btn-success" href="controller/pelanggan/pemesanan.php?id_produk=<?php echo $produk['id_produk']; ?>&harga=<?php echo $produk['harga']; ?>&id=<?php if (isset($_SESSION['role'])) {
                                                                                                                                                                                                            if ($_SESSION['role'] == 'pelanggan') {
                                                                                                                                                                                                                echo $_SESSION['id_pelanggan'];
                                                                                                                                                                                                            } elseif ($_SESSION['role'] == 'karyawan') {
                                                                                                                                                                                                                echo "login_karyawan";
                                                                                                                                                                                                            }
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            echo "belum_login";
                                                                                                                                                                                                        }
                                                                                                                                                                                                        ?>&jumlah=1">Beli</a>

                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- End Produk -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.js"></script>
</body>

</html>