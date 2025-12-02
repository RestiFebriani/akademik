<?php
include ('koneksi.php');

if (isset($_POST['submit'])) {

    $nim       = $_POST['nim']; 
    $nama_mhs  = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat)
                VALUES ('$nim', '$nama_mhs', '$tgl_lahir', '$alamat')"; 

    $query = $koneksi->query($sql);

    // Cek apakah query berhasil
    if ($query) {
        header ('Location: index.php');
        exit();
    } else {
        echo "<script>alert('Gagal menyimpan data! Error: " . $koneksi->error . "'); window.location='index.php';</script>"; 
        exit();
    }
}
?>