<?php
require '../koneksi.php';

$sql = "
  SELECT mahasiswa.*, prodi.nama_prodi 
  FROM mahasiswa 
  LEFT JOIN prodi ON mahasiswa.prodi_id = prodi.id
  ORDER BY mahasiswa.nim ASC
";

$hasil = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Akademik</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Akademik</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto gap-2">
        <li class="nav-item">
          <a class="nav-link active" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../mahasiswa/index.php">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../prodi/index.php">Prodi</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<body>

<div class="container py-4">
  <h1 class="mb-4 text-center">Data Mahasiswa</h1>

  <a href="create.php" class="btn btn-success mb-3">
    Tambah Data Baru
  </a>

  <div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
      <thead class="table-primary">
        <tr>
          <th>NIM</th>
          <th>Nama</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Program Studi</th>
          <th width="160">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php if ($hasil->num_rows > 0) : ?>
          <?php while ($row = $hasil->fetch_assoc()) : ?>
          <tr>
            <td><?= htmlspecialchars($row['nim']) ?></td>
            <td><?= htmlspecialchars($row['nama_mhs']) ?></td>
            <td><?= htmlspecialchars($row['tgl_lahir']) ?></td>
            <td><?= htmlspecialchars($row['alamat']) ?></td>
            <td><?= htmlspecialchars($row['nama_prodi'] ?? '-') ?></td>
            <td>
              <a href="update.php?id=<?= $row['nim']; ?>" class="btn btn-warning btn-sm">
                Update
              </a>
              <a href="deleted.php?id=<?= $row['nim']; ?>" 
                 class="btn btn-danger btn-sm"
                 onclick="return confirm('Yakin menghapus data <?= $row['nim'] ?> ?')">
                Hapus
              </a>
            </td>
          </tr>
          <?php endwhile; ?>
        <?php else : ?>
          <tr>
            <td colspan="6" class="text-center">Belum Ada Data Mahasiswa</td>
          </tr>
        <?php endif; ?>

      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
