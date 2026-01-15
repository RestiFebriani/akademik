<?php
session_start();
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php">Akademik</a>

    <ul class="navbar-nav ms-auto gap-2 align-items-center">

      <?php if (!isset($_SESSION['login'])) : ?>
        <!-- Jika BELUM login -->
        <li class="nav-item">
          <a class="btn btn-outline-light btn-sm" href="../akademik/pengguna/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-warning btn-sm" href="../akademik/pengguna/registrasi.php">Buat Akun</a>
        </li>

      <?php else : ?>
        <!-- Jika SUDAH login -->
        <li class="nav-item text-light me-2">
          Halo, <?= htmlspecialchars($_SESSION['nama'] ?? 'User'); ?>
        </li>
        <li class="nav-item">
          <a class="btn btn-primary btn-sm" href="../akademik/pengguna/editprofil.php">Edit Profil</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-danger btn-sm" href="../akademik/pengguna/logout.php">Logout</a>
        </li>
      <?php endif; ?>

    </ul>
  </div>
</nav>

<!-- Konten Utama -->
<div class="container mt-5 text-center">
    <h3>Selamat Datang di Sistem Akademik</h3>
    <p>Silakan pilih menu di bawah</p>

    <div class="d-flex justify-content-center gap-3 mt-4">
        <?php if (isset($_SESSION['login'])) : ?>
            <a href="mahasiswa/index.php" class="btn btn-primary btn-lg">Mahasiswa</a>
            <a href="prodi/indexprodi.php" class="btn btn-success btn-lg">Prodi</a>
        <?php else : ?>
            <a href="../akademik/pengguna/login.php" class="btn btn-primary btn-lg">Mahasiswa</a>
            <a href="../akademik/pengguna/login.php" class="btn btn-success btn-lg">Prodi</a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
