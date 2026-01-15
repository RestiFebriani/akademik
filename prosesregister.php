<?php
include "koneksi.php";

// Cegah akses langsung
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: register.php");
    exit;
}

$nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
$email    = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

// Cek email sudah terdaftar
$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");
if (!$cek) {
    die("Query error: " . mysqli_error($koneksi));
}

if (mysqli_num_rows($cek) > 0) {
    echo "<script>
        alert('Email sudah terdaftar');
        window.location='registrasi.php';
    </script>";
    exit;
}

// Simpan user baru
$query = mysqli_query($koneksi,
    "INSERT INTO user (nama, email, password)
     VALUES ('$nama', '$email', '$password')"
);

if ($query) {
    echo "<script>
        alert('Akun berhasil dibuat');
        window.location='login.php';
    </script>";
} else {
    die("Gagal daftar: " . mysqli_error($koneksi));
}
