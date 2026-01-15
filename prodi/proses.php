<?php
include "../koneksi.php";

$nama   = $_POST['nama_prodi'];
$jenjang = $_POST['jenjang'];

$sql = "INSERT INTO prodi (nama_prodi, jenjang) 
        VALUES ('$nama', '$jenjang')";

mysqli_query($koneksi, $sql);

header("Location: indexprodi.php");
exit;
