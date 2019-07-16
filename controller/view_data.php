<?php
include_once("../database/koneksi.php");
$hasil = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `printer`"), MYSQLI_ASSOC);
