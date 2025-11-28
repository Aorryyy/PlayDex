<?php //ini login woi
include 'connection.php';
session_start();

if (isset($_POST['login'])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // CEK USER DI DATABASE
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query);

    // jika user ditemukan
    if (mysqli_num_rows($result) === 1) {

        $data = mysqli_fetch_assoc($result);

        // simpan session
        $_SESSION['id_users'] = $data['id_users'];
        $_SESSION['username'] = $data['username'];

        header("Location: dashboard.php");
        exit();
    } 
    else {
        echo "<script>
                alert('Username atau password salah!');
                window.location='login.html';
              </script>";
    }
}
?>