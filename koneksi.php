<?php
$host     = "localhost";
$user     = "root";
$password = "";
$db_name  = "db_akademik";

// Buat koneksi
$koneksi = new mysqli($host, $user, $password, $db_name);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
?>
