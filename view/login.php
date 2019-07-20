<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Pelanggan</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <?php
    include("../database/koneksi.php");
    session_start();
    ?>
    <!-- End Navbar -->
    <!-- Konten -->
    <div class="container" style="padding-top:10%;">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card p-4">
                    <form method="post" action="../controller/auth.php">
                        <h3 class="text-center mb-3">Login Pelanggan</h3>
                        <?php include("feedback/feedback.php"); ?>
                        <div class="mb-4">
                            <div class="form-group">
                                <input class="form-control" type="text" name="username" placeholder="Username" id="username">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" placeholder="Password" id="password">
                            </div>
                        </div>
                        <input class="btn btn-primary btn-block" type="submit" value="Login" name="login" id="login">
                        <a class="btn btn-secondary btn-block" href="daftar_pelanggan.php">Daftar</a>
                    </form>
                </div>
                <div class="text-center p-2">
                    <a href="../index.php">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Konten -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/popper.js"></script>
</body>

</html>