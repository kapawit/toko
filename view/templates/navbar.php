<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand p-2" href="#"><img src="../../assets/img/logo.png" width="70%"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active p-2">
                    <a class="nav-link" href="http://localhost:8080/VSGA/toko">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active p-2">
                    <a class="nav-link" href="view/home/Profil.php">Profil</a>
                </li>
                <li class="nav-item active p-2">
                    <a class="nav-link" href="view/home/berita.php">Berita</a>
                </li>
                <li class="nav-item active p-2">
                    <a class="nav-link" href="view/home/about.php">About Us</a>
                </li>
                <li class="nav-item p-2">
                    <div class="dropdown">
                        <button type="button" class="btn btn-outline-success dropdown-toggle pl-3 pr-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                echo '<a class="dropdown-item pl-3 pr-3" href="../../controller/auth/logout.php">Logout</a>';
                            } else {
                                echo '<a class="dropdown-item pl-3 pr-3" href="../../view/home/login.php">Masuk</a>';
                                echo '<a class="dropdown-item pl-3 pr-3" href="../../view/pelanggan/daftar_pelanggan.php">Daftar</a>';
                            } ?>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>