<!DOCTYPE html>
<html>

<head>
    <title>Toko | Edit produk</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <?php
    $id_produk = $_GET['id_produk'];
    include("../database/koneksi.php");
    $query_produk = mysqli_query($koneksi, "SELECT id_produk, warna, jumlah, nama_produk, id_merk, id_kategori FROM produk where id_produk=$id_produk");
    $produk = mysqli_fetch_assoc($query_produk);
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
        <h3 class="text-center">Edit Produk</h3>
        <form action="../controller/update_produk.php" method="post">
            <input type="hidden" name="id_produk" value="<?= $id_produk; ?>">
            <div class="form-group">
                <label for="nama_produk">Nama produk</label>
                <input type="text" value="<?= $produk['nama_produk']; ?>" class="form-control" name="nama_produk" id="nama_produk">
            </div>
            <div class="form-group">
                <label for="warna">Warna</label>
                <input type="text" class="form-control" value="<?= $produk['warna']; ?>" name="warna" id="warna">
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" value="<?= $produk['jumlah']; ?>" name="jumlah" id="jumlah">
            </div>
            <div class="form-group">
                <label for="merk">Merk</label>
                <select class="form-control" name="merk" id="merk">
                    <?php foreach ($query_merk as $key => $row) { ?>
                        <option value="<?php echo $row['id_merk'] ?>" <?php if ($row['id_merk'] == $produk['id_merk']) {
                                                                            echo 'selected';
                                                                        } ?>><?php echo $row['nama_merk'] ?></option>
                    <?php
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="merk">Kategori</label>
                <select class="form-control" name="kategori" id="kategori">
                    <?php foreach ($query_kategori as $key => $row) { ?>
                        <option value="<?php echo $row['id_kategori'] ?>" <?php if ($row['id_kategori'] == $produk['id_kategori']) {
                                                                                echo 'selected';
                                                                            } ?>><?php echo $row['nama_kategori'] ?></option>

                    <?php
                    } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="submit" name="submit">
            <input type="reset" class="btn btn-secondary" value="Reset" name="reset" />
        </form>
    </div>
    <!-- End konten -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/popper.js"></script>
</body>

</html>