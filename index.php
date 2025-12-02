<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akademik - Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4 text-center">List Data Mahasiswa</h1>
        
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
            Tambah Data Baru
        </button>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require 'koneksi.php';

                        $hasil = $koneksi->query("SELECT * FROM mahasiswa ORDER BY nim ASC");
                        
                        while ($row = $hasil->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $row['nim'] ?></td> 
                        <td><?= $row['nama_mhs'] ?></td> 
                        <td><?= $row['tgl_lahir'] ?></td> 
                        <td><?= $row['alamat'] ?></td> 
                        <td>
                            <a href="update.php?id=<?= $row['nim']; ?>" class="btn btn-warning btn-sm me-2">Update</a>
                            <a href="deleted.php?id=<?= $row['nim']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data <?= $row['nim'] ?>?')";>Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="tambahDataModalLabel">Input Data Mahasiswa Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="proses.php" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <label for="nimInput" class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" id="nimInput" required maxlength="20">
              </div>
              <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <input type="text" name="nama_mhs" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>