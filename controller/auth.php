<?php
// mengaktifkan session php
session_start();
include("../database/koneksi.php");

if (isset($_POST['username']) && ($_POST['password'])) {
    $username_pelanggan = $_POST['username'];
    $password_pelanggan = $_POST['password'];
    $data = mysqli_query($koneksi, "select * from pelanggan where username_pelanggan='$username_pelanggan' and password_pelanggan='$password_pelanggan'");
    $data_pelanggan = mysqli_fetch_array($data);
    $cek = mysqli_num_rows($data);
    if ($cek > 0) {
        $_SESSION['status'] = "login";
        $_SESSION['nama_pelanggan'] = $data_pelanggan['nama_pelanggan'];
        $_SESSION['id_pelanggan'] = $data_pelanggan['id_pelanggan'];
        header("location:../index.php?pesan=sukses");
    } else {
        header("location:../view/login.php?pesan=gagal");
    }
} else {
    header("location:../view/login.php?pesan=kosong");
}
