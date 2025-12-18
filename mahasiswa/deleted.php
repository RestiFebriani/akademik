<?php
include "../koneksi.php";

if (isset($_GET['id'])) {
    $nim_hapus = $_GET['id'];
} else {
    echo "<script>alert('ID Mahasiswa tidak ditemukan.'); window.location='index.php';</script>";
    exit();
}

$nim_bersih = mysqli_real_escape_string($koneksi, $nim_hapus);

$sql = "DELETE FROM mahasiswa WHERE nim='$nim_bersih'";
$query = $koneksi->query($sql);

if ($query) {
    header("location: index.php");
    exit();
} else {
    echo "<script>alert('Gagal menghapus data. Error: " . $koneksi->error . "'); window.location='index.php';</script>";
    exit();
}
?>