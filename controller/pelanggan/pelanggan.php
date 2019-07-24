<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $username_pelanggan = $_POST['username_pelanggan'];
    $password_pelanggan = $_POST['password_pelanggan'];
    include_once("../../database/koneksi.php");
    mysqli_query($koneksi, "INSERT INTO pelanggan(nama_pelanggan,alamat,jenis_kelamin,username,pass) VALUES('$nama','$alamat','$jenis_kelamin','$username_pelanggan','$password_pelanggan')");
    header('location:../../view/home/login.php?pesan=daftar_sukses');
}
