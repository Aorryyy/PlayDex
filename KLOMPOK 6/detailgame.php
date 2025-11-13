<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = "SELECT * FROM game WHERE id_game = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<h1><?php echo $data['title']; ?></h1>
<p>Genre: <?php echo $data['genre']; ?></p>