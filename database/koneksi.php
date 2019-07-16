<?php

$server = '127.0.0.1';
$database = 'toko';
$username = 'root';
$password = '';
$port = '3307';

$koneksi = mysqli_connect($server, $username, $password, $database, $port);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
