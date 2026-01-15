<?php
include "../koneksi.php";

$id     = $_POST['id'];
$nama   = $_POST['nama_prodi'];
$jenjang = $_POST['jenjang'];

mysqli_query($koneksi, 
  "UPDATE prodi SET 
   nama_prodi='$nama', 
   jenjang='$jenjang' 
   WHERE id='$id'"
);

header("Location: indexprodi.php");
