<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

// Query cek user
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($connect, $query);

// Jika jumlah row = 1 berarti ada pengguna
if(mysqli_num_rows($result) === 1){
    $user = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $user['username'];

    header("Location: index.php");
    exit();
} else {
    echo "<script>alert('Username atau password salah!'); window.location='login.php';</script>";
}
?>