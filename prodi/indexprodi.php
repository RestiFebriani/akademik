<?php
session_start();
include "../koneksi.php";

$data = $koneksi->query("SELECT * FROM prodi");
?>
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


<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h4>Data Program Studi</h4>
        <a href="create_prodi.php" class="btn btn-success">+ Tambah Prodi</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th width="60">No</th>
                <th>Nama Prodi</th>
                <th>Jenjang</th>
                <th width="180" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        while ($row = $data->fetch_assoc()):
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_prodi']; ?></td>
                <td><?= $row['jenjang']; ?></td>
                <td class="text-center">
                    <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <a href="delete.php?id=<?= $row['id']; ?>"
                       onclick="return confirm('Yakin ingin menghapus prodi ini?')"
                       class="btn btn-danger btn-sm">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

</div>

</body>
</html>
