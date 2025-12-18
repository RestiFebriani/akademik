<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Tambah Prodi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h5>Tambah Prodi</h5>

  <form action="proses.php" method="post">
    <div class="mb-3">
      <label>Nama Prodi</label>
      <input type="text" name="nama_prodi" class="form-control" required>
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
