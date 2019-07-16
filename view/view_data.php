<!DOCTYPE html>
<html>

<head>
    <title>View Data</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <?php
    include("../database/koneksi.php");
    $query_produk = mysqli_query($koneksi, "SELECT produk.id_produk, produk.jumlah, produk.nama_produk, merk.nama_merk, kategori.nama_kategori
    FROM ((produk
    INNER JOIN merk ON produk.id_merk = merk.id_merk)
    INNER JOIN kategori ON produk.id_kategori = kategori.id_kategori) ORDER BY id_produk asc;");
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
        <h1 class="text-center">Data Barang</h1>
        <table class="table table-bordered" width="100%">
            <thead>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Merk</th>
                <th>Kategori</th>
            </thead>
            <tbody>
                <?php
                while ($produk = mysqli_fetch_array($query_produk)) {
                    echo "<tr>";
                    echo "<td>" . $produk['id_produk'] . "</td>";
                    echo "<td>" . $produk['nama_produk'] . "</td>";
                    echo "<td>" . $produk['jumlah'] . "</td>";
                    echo "<td>" . $produk['nama_merk'] . "</td>";
                    echo "<td>" . $produk['nama_kategori'] . "</td>";
                    echo "<tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- End Konten -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.js"></script>
</body>

</html>