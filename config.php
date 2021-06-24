// UNTUK KONEKSI DATABASE
<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_pegawai"; // Database name yang akan digunakan

// Create connection
$db = mysqli_connect($server, $user, $password, $nama_database);
// Check connection
if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>
