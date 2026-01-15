<?php
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    
    // Perhatikan: Jika error, pastikan tidak ada data mahasiswa yang memakai ID prodi ini
    $query = mysqli_query($koneksi, "DELETE FROM prodi WHERE id='$id'");
    
    if ($query) {
        header("Location: indexprodi.php");
    } else {
        echo "<script>alert('Gagal menghapus! Data ini mungkin sedang digunakan oleh tabel mahasiswa.'); window.location='index.php';</script>";
    }
}
?>