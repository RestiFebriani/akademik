<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $nim_hapus = $_GET['id'];
} else {
    echo "<script>alert('NIM tidak ditemukan.'); window.location='index.php';</script>";
    exit();
}

$sql = "DELETE FROM mahasiswa WHERE nim='$nim_hapus'";
$query = $koneksi->query($sql);

if ($query) {
    header("location: index.php");
    exit();
} else {
    echo "<script>alert('Gagal menghapus data. Error: " . $koneksi->error . "'); window.location='index.php';</script>";
    exit();
}
?>