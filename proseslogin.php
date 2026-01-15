<?php
session_start();
include "koneksi.php";

// Cegah akses langsung
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$email    = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

// Ambil data user
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");
if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}

$user = mysqli_fetch_assoc($query);

// Cek email
if (!$user) {
    echo "<script>
        alert('Email tidak terdaftar');
        window.location='login.php';
    </script>";
    exit;
}

// Cek password (sesuai model kamu: plain text)
if ($password == $user['password']) {

    $_SESSION['login'] = true;
    $_SESSION['nama']  = $user['nama'];

    header("Location: index.php");
    exit;

} else {
    echo "<script>
        alert('Password salah');
        window.location='login.php';
    </script>";
}
