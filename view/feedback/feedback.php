<?php
if (isset($_GET['transaksi'])) {
  if ($_GET['transaksi'] == "gagal") {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Transaksi Gagal<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button></div>";
  } else if ($_GET['transaksi'] == "sukses") {
    echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>Transaksi Berhasil<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button></div>";
  }
}

if (isset($_GET['pesan'])) {
  if ($_GET['pesan'] == "gagal") {
    echo "<div class='alert alert-danger'>Login gagal! username dan password salah!</div>";
  } else if ($_GET['pesan'] == "logout") {
    echo "<div class='alert alert-info'>Anda telah berhasil logout</div>";
  } else if ($_GET['pesan'] == "belum_login") {
    echo "<div class='alert alert-warning'>Anda harus login untuk dapat mengakses halaman Ini</div>";
  } else if ($_GET['pesan'] == "daftar_sukses") {
    echo "<div class='alert alert-success'>Registrasi Sukses. Silahkan Login</div>";
  } else if ($_GET['pesan'] == "kosong") {
    echo "<div class='alert alert-danger'>Username dan Password harus diisi</div>";
  } else if ($_GET['pesan'] == "tidak_terdaftar") {
    echo "<div class='alert alert-danger'>Username tidak terdaftar</div>";
  }
}
