<?php
include "../koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM prodi WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Edit Prodi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h4>Edit Prodi</h4>

  <form action="proses_update.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">

    <div class="mb-3">
      <label class="form-label">Nama Program Studi</label>
      <input type="text" name="nama_prodi" class="form-control" value="<?= $row['nama_prodi']; ?>">
    </div>

    <div class="mb-3">
      <label>Jenjang</label>
      <select name="jenjang" class="form-control" required>
        <option value="">-- Pilih --</option>
        <option>D2</option>
        <option>D3</option>
        <option>D4</option>
        <option>S1</option>
      </select>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
      <a href="index.php" class="btn btn-success">Data Prodi</a>
  </form>
</div>

</body>
</html>
