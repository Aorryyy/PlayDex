<?php
include "koneksi.php";

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users (name, username, email, password)
        VALUES ('$name', '$username', '$email', '$password')";

if(mysqli_query($connect, $sql)){
    echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
} else {
    echo "Error: " . mysqli_error($connect);
}
?>