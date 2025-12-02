<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

// Cek user di database
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
$result = mysqli_query($connect, $sql);

// Kalau ada 1 user cocok
if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);

    // Simpan data penting ke session
    $_SESSION['user_id']  = $user['id_users'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['name']     = $user['name'];
    $_SESSION['email']    = $user['email'];

    // Arahkan ke halaman utama
    header("Location: index.php");
    exit();
} else {
    // Login gagal
    echo "<script>alert('Username atau password salah'); window.location='login.php';</script>";
    exit();
}