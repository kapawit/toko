<!doctype html>
<html lang="en" style="height: 100%;">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Pelanggan</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body style="background-image:url(../../assets/img/bg-login4.png);background-size:cover">
    <?php
    include("../../database/koneksi.php");
    session_start();
    ?>
    <!-- End Navbar -->
    <!-- Konten -->
    <div>
        <div class="container" style="padding-top:5%;padding-bottom:5%;">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="card">
                        <form method="post" action="../../controller/auth/auth.php">
                            <div class="card-header">
                                <div class="mx-5 px-4">
                                    <img src="../../assets/img/logo.png" width="100%">
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center mb-3">Login</h3>
                                <?php include("../feedback/feedback.php"); ?>
                                <div class="mb-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="username" placeholder="Username" id="username">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="password" placeholder="Password" id="password">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="role" id="role">
                                            <option value="" disabled selected>--- Login sebagai ---</option>
                                            <option value="pelanggan">Pelanggan</option>
                                            <option value="karyawan">Karyawan</option>
                                        </select>
                                    </div>
                                </div>
                                <input class="btn btn-primary btn-block" type="submit" value="Login" name="login" id="login">
                            </div>
                            <div class="card-footer">
                                <div class="row text-center">
                                    <div class="col-md-6 col-sm-6">
                                        <a class="btn btn-outline-secondary btn-block" href="../../index.php">Beranda</a>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <a class="btn btn-outline-info btn-block" href="../pelanggan/daftar_pelanggan.php">Daftar</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Konten -->
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/popper.js"></script>
</body>

</html>