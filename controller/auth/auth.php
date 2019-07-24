<?php
// mengaktifkan session php
session_start();
include("../../database/koneksi.php");

if (isset($_POST['username']) && ($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $fetch = mysqli_query($koneksi, "SELECT * FROM $role WHERE username='$username' and pass='$password'");
    $data = mysqli_fetch_array($fetch);
    $cek = mysqli_num_rows($fetch);
    if ($cek > 0) {
        if ($role == 'pelanggan') {
            $_SESSION['role'] = 'pelanggan';
            $_SESSION['nama_pelanggan'] = $data['nama_pelanggan'];
            $_SESSION['id_pelanggan'] = $data['id_pelanggan'];
            header("location:../../index.php?pesan=sukses");
        } else if ($role == 'karyawan') {
            $_SESSION['role'] = 'karyawan';
            $_SESSION['nama_karyawan'] = $data['nama_karyawan'];
            $_SESSION['id_karyawan'] = $data['id_karyawan'];
            header("location:../../index.php?pesan=sukses");
        }
    } else {
        header("location:../../view/home/login.php?pesan=gagal");
    }
} else {
    header("location:../../view/home/login.php?pesan=kosong");
}
