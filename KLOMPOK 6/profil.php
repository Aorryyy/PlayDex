<?php
session_start();
include "koneksi.php";

// Kalau belum login -> lempar ke login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil data fresh dari database
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
            padding: 20px;
        }

        /* ==== NAVBAR ==== */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            height: 70px;
            background-color: #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 28px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.5);
            z-index: 100;
        }

        .navbar .logo {
            color: #fff;
            font-size: 22px;
            font-weight: 600;
            letter-spacing: 1px;
            font-family: 'Poppins', sans-serif;
        }

        .profile-card {
            background: linear-gradient(135deg, #1a1a1a 0%, #0d0d0d 100%);
            border: 1px solid #333;
            border-radius: 15px;
            padding: 30px;
            margin-top: 50px;
            margin-bottom: 20px;
        }

        .profile-header {
            display: flex;
            gap: 20px;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #333;
        }

        .profile-info h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .username {
            color: #888;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .stats {
            display: flex;
            gap: 20px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-label {
            color: #888;
            font-size: 12px;
        }

        .stat-value {
            font-size: 18px;
            font-weight: bold;
        }

        .bio {
            color: #ddd;
            font-size: 14px;
        }

        .game-review {
            background: linear-gradient(135deg, #1a1a1a 0%, #0d0d0d 100%);
            border: 1px solid #333;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            position: relative;
        }

        .game-header {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .game-cover {
            width: 60px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }

        .game-info {
            flex: 1;
        }

        .game-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .game-meta {
            color: #888;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .game-date {
            color: #666;
            font-size: 11px;
        }

        .rating {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 36px;
            font-weight: bold;
            color: #00d9ff;
        }

        .review-content {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
        }

        .review-text {
            flex: 1;
        }

        .review-author {
            color: #888;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .review-body {
            color: #ddd;
            font-size: 13px;
            line-height: 1.5;
        }

        .fire {
            color: #ff6b00;
        }

        .emoji {
            color: #ffd700;
        }
    </style>
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="logo">★ playdex</div>
    </nav>

<div class="profile-card">
            <div class="profile-header">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=aul" alt="Profile" class="profile-pic">
                <div class="profile-info">
                    <h2>aul</h2>
                    <div class="username">@jodohshoyo</div>
                    <div class="stats">
                        <div class="stat-item">
                            <div class="stat-label">Following</div>
                            <div class="stat-value">20</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Followers</div>
                            <div class="stat-value">100</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bio">
                I love being meow meow <span class="emoji">😊</span>
            </div>
        </div>

        <div class="game-review">
            <div class="game-header">
                <img src="https://images.unsplash.com/photo-1552820728-8b83bb6b773f?w=100&h=140&fit=crop" alt="Genshin Impact" class="game-cover">
                <div class="game-info">
                    <div class="game-title">Genshin Impact</div>
                    <div class="game-meta">Role-playing (RPG), Adventure | 2020</div>
                    <div class="game-date">07 Desember 2025</div>
                </div>
            </div>
            <div class="rating">9.6</div>
            <div class="review-content">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=reviewer1" alt="User" class="user-avatar">
                <div class="review-text">
                    <div class="review-author">SIAPA YANG MENYURUH BRO HOYO MEMASAKKKKKKKKKKK <span class="fire">🔥🔥🔥</span></div>
                    <div class="review-body">Hoyo aku mau c6r5 wawan bejirr, kasih aku pls, nanti aku rating 10 di playstore, makasih ya hoyo, kalo bisa kazuha c6r5 dan sekalian, tapi tambah lynney c6r5 juga boleh kok hoyo <span class="emoji">😊😊😊</span></div>
                </div>
            </div>
        </div>

        <div class="game-review">
            <div class="game-header">
                <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?w=100&h=140&fit=crop" alt="Honkai Star Rail" class="game-cover">
                <div class="game-info">
                    <div class="game-title">Honkai Star Rail</div>
                    <div class="game-meta">Role-playing (RPG), Turn-based strategy (TBS), Adventure | 2023</div>
                    <div class="game-date">27 Nomber 2025</div>
                </div>
            </div>
            <div class="rating">9.8</div>
            <div class="review-content">
                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=reviewer2" alt="User" class="user-avatar">
                <div class="review-text">
                    <div class="review-author">SHAOJI EEKKKKKKKKK MENGAPA FHAINON GW JADI MEMORI DOANGGGGG</div>
                    <div class="review-body">FAKKK MANA YANG NAMANYA AMPHORISUS ITU HEARTWAMING YANG ADA HEART ATTACK?????????????? GW NANGISSSSSSSSSSSSS</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>