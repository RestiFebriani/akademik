<?php
include('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nim       = $_POST['nim'];
    $nama_mhs  = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];
    $prodi_id  = $_POST['prodi_id'];

    $sql = "INSERT INTO mahasiswa 
            (nim, nama_mhs, tgl_lahir, alamat, prodi_id)
            VALUES 
            ('$nim', '$nama_mhs', '$tgl_lahir', '$alamat', '$prodi_id')";

    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "ERROR QUERY: " . mysqli_error($koneksi);
        exit;
    }
}
