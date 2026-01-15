<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Tambah Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card">
        <div class="card-header fw-bold">Tambah Prodi Baru</div>
        <div class="card-body">

            <form action="proses.php" method="post">
                <div class="mb-3">
                    <label>Nama Prodi</label>
                    <input type="text" name="nama_prodi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Jenjang</label>
                    <select name="jenjang" class="form-control" required>
                        <option value="">-- Pilih Jenjang --</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                    </select>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="indexprodi.php" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>
</div>

</body>
</html>
