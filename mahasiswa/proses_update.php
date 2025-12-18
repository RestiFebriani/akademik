<?php
include "../koneksi.php";

$nim_lama = $_POST['nim_lama'];
$nama     = $_POST['nama_mhs'];
$tgl      = $_POST['tgl_lahir'];
$alamat   = $_POST['alamat'];
$prodi_id = $_POST['prodi_id'];

$sql = "UPDATE mahasiswa SET
        nama_mhs='$nama',
        tgl_lahir='$tgl',
        alamat='$alamat',
        prodi_id='$prodi_id'
        WHERE nim='$nim_lama'";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("Location: index.php");
    exit;
} else {
    echo "Update gagal: " . mysqli_error($koneksi);
}
?>
