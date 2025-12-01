<?php
include "koneksi.php"; // PASTIKAN nama file sama

if (!isset($_GET['id'])) {
    die("Game not found.");
}

$id = intval($_GET['id']);

$query = mysqli_query($connect, "SELECT * FROM game WHERE id_game = '$id'");
$game = mysqli_fetch_assoc($query);

if (!$game) {
    die("Game not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $game['title']; ?> - Detail</title>
    <link rel="stylesheet" href="detail.css">
</head>
<body>
    <div class="detail-container">
    <!-- LEFT SIDE -->
    <div class="left-side">
        <img src="img/<?= $game['cover']; ?>" class="cover-img">
        <div class="review-box">
            <h2>Review</h2>
            <p>(Di sini nanti bisa kamu isi komentar user / review database)</p>
        </div>
    </div>

    <!-- RIGHT SIDE -->
    <div class="right-side">
        <h1 class="game-title"><?= $game['title']; ?></h1>
        <p class="release">Release: <?= date("d / m / Y", strtotime($game['release_date'])); ?></p>
        <div class="info-text">
            <p><b>Developers:</b> <?= $game['developer']; ?></p>
            <p><b>Publishers:</b> <?= $game['publisher']; ?></p>
            <p><b>Genre:</b> <?= $game['genre']; ?></p>
            <p><b>Platform:</b> <?= $game['platform']; ?></p>
            <p><?= $game['description']; ?></p>
        </div>
        <h2 class="sub-title">More from <?= $studio; ?></h2>
        <div class="more-games">
            <?php while ($row = mysqli_fetch_assoc($more)): ?>
                <a href="detail.php?id=<?= $row['id']; ?>" class="more-card">
                    <img src="img/<?= $row['image']; ?>">
                    <span><?= $row['title']; ?></span>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
    </div>
</body>
</html>