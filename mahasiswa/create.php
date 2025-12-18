<?php
require('../koneksi.php');

$query = "SELECT id, nama_prodi FROM prodi";
$result = mysqli_query($koneksi, $query);
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Akademik - Tambah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
<body>
  <div class="container py-4">
    <h1 class="mb-4">Input Data Mahasiswa</h1>

    <form action="proses.php" method="post">
      <div class="mb-3">
        <label for="nimInput" class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" id="nimInput" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama_mhs" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= $data['tgl_lahir']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Program Studi</label>
        <select name="prodi_id" class="form-control" required>
          <option value="">-- Pilih Prodi --</option>

          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <option value="<?=  $row['id']; ?>">
                <?=  $row['nama_prodi']; ?>
          </option>
          <?php endwhile; ?>
        </select>
      </div>

      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
      <a href="index.php" class="btn btn-success">Data Mahasiswa</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>