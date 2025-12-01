<?php
session_start();
include "koneksi.php";

// Kalau belum login -> lempar ke login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// (opsional) Ambil data fresh dari database
$user_id = $_SESSION['user_id'];
$sql  = "SELECT * FROM users WHERE id_users = $user_id LIMIT 1";
$res  = mysqli_query($connect, $sql);
$user = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <style>
        body {
            background:#050505;
            color:#fff;
            font-family:sans-serif;
        }
        .card {
            max-width:400px;
            margin:80px auto;
            padding:25px 20px;
            background:#151515;
            border-radius:12px;
        }
        a { color:#00eaff; text-decoration:none; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Profil Saya</h2>
        <p><strong>Nama:</strong> <?= htmlspecialchars($user['name']); ?></p>
        <p><strong>Username:</strong> <?= htmlspecialchars($user['username']); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>

        <br>
        <a href="index.php">⬅ Kembali ke Beranda</a> |
        <a href="logout.php">Keluar</a>
    </div>
</body>
</html>