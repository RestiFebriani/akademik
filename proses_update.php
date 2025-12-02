<?php
include "koneksi.php";

if (isset($_POST['update'])) {

    $nim_lama  = trim($_POST['nim_lama']); // Kunci utama untuk klausa WHERE
    $nama_mhs  = trim($_POST['nama_mhs']);
    $tgl_lahir = trim($_POST['tgl_lahir']);
    $alamat    = trim($_POST['alamat']);

    $nim_lama_esc   = addslashes($nim_lama);
    $nama_mhs_esc   = addslashes($nama_mhs);
    $tgl_lahir_esc  = addslashes($tgl_lahir);
    $alamat_esc     = addslashes($alamat);

    $sql = "UPDATE mahasiswa SET 
            nama_mhs='$nama_mhs_esc', 
            tgl_lahir='$tgl_lahir_esc',
            alamat='$alamat_esc'
            WHERE nim='$nim_lama_esc'"; 

    $query = $koneksi->query($sql);

    if ($query) {
        echo "<script>alert('Data berhasil diperbarui'); window.location='index.php?pesan=sukses_update';</script>";
        exit();
    } else {
        $error_message = $koneksi->error;
        echo "<script>alert('Gagal update data. Error: " . $error_message . "'); window.location='update.php?id=$nim_lama';</script>";
        exit();
    }
} else {
    header("location: index.php");
    exit();
}
?>