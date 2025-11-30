<?
include 'connection.php';
session_start();

$id_user = $_SESSION['id_user'];
$id_game = $_POST['id_game'];
$rating = $_POST['rating'];
$komentar = $_POST['komentar'];

mysqli_query($conn, 
"INSERT INTO rating(id_user, id_game, rating, komentar)
VALUES ('$id_user', '$id_game', '$rating', '$komentar')");

header("Location: detailgame.php?id=$id_game");
?>