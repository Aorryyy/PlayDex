<?php // ini register
include 'koneksi.php';

if (isset($_POST['register'])) {

    $name     = $_POST["name"];
    $email    = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "INSERT INTO users (name, email, username, password)
              VALUES ('$name', '$email', '$username', '$password')";

    mysqli_query($connect, $query);

    echo "<script>
            alert('Pendaftaran berhasil! Silakan login.');
            window.location='login.html';
          </script>";
}
?>