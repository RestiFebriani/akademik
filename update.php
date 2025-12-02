<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$nim_cari = $_GET['id'];

$nim_esc = addslashes($nim_cari);

$sql_select = "SELECT * FROM mahasiswa WHERE nim='$nim_esc'";
$query = $koneksi->query($sql_select);
$data = $query->fetch_assoc();

if (!$data) {
    die("Data mahasiswa tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mb-4">Edit Data Mahasiswa</h3>
            <div class="card p-4 shadow-sm">
                <form method="POST" action="proses_update.php"> 
                    
                    <input type="hidden" name="nim_lama" value="<?= htmlspecialchars($data['nim']); ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control bg-light" value="<?= htmlspecialchars($data['nim']); ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama_mhs" value="<?= htmlspecialchars($data['nama_mhs']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="<?= htmlspecialchars($data['tgl_lahir']); ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3" required><?= htmlspecialchars($data['alamat']); ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning" name="update">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>