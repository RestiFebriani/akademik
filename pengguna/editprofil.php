<?php
session_start();
require "../koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['id'];

// ambil data user dari database
$user = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM user WHERE id=$id LIMIT 1")
);

$error = $success = "";

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $pass = trim($_POST['password']); // opsional

    if ($nama == "") {
        $error = "Nama tidak boleh kosong";
    } else {
        if ($pass != "") {
            // update nama & password (plain text)
            $sql = "UPDATE user SET nama='$nama', password='$pass' WHERE id=$id";
        } else {
            // update nama saja
            $sql = "UPDATE user SET nama='$nama' WHERE id=$id";
        }

        if (mysqli_query($koneksi, $sql)) {
            $_SESSION['nama'] = $nama; // update session
            $success = "Profil berhasil diperbarui";
        } else {
            $error = "Terjadi kesalahan: " . mysqli_error($koneksi);
        }

        // refresh data user
        $user = mysqli_fetch_assoc(
            mysqli_query($koneksi, "SELECT * FROM user WHERE id=$id LIMIT 1")
        );
    }
}
?>

<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Edit Profil</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container col-md-5 mt-5">
<h4>Edit Profil</h4>

<?php if($error): ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<?php if($success): ?>
<div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>

<form method="post">
<div class="mb-3">
<label>Nama Lengkap</label>
<input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($user['nama']); ?>" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="text" class="form-control" value="<?= htmlspecialchars($user['email']); ?>" readonly>
</div>

<hr>
<h6>Ganti Password (Opsional)</h6>
<div class="mb-3">
<label>Password Baru</label>
<input type="text" name="password" class="form-control" placeholder="Isi jika ingin ganti password">
</div>

<button name="submit" class="btn btn-primary w-100">Simpan</button>
<a href="../index.php" class="btn btn-secondary w-100 mt-2">Batal</a>
</form>
</div>

</body>
</html>
