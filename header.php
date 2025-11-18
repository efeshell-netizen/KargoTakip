<?php include "config.php"; ?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>KadirX Kargo Takip Sistemi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }
        .sidebar {
            width: 230px;
            min-height: 100vh;
            background: <?= $settings["theme_color"]; ?>;
            color: white;
            padding: 20px;
            position: fixed;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px 0;
            text-decoration: none;
            font-size: 16px;
        }
        .sidebar a:hover {
            opacity: 0.8;
        }
        .content {
            margin-left: 250px;
            padding: 25px;
        }
        .logo {
            width: 150px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
<div class="sidebar">
    <img src="<?= $settings["logo"]; ?>" class="logo">

    <a href="index.php">📦 Dashboard</a>
    <a href="modules/cariler">📇 Cariler</a>
    <a href="modules/raporlar">📊 Raporlar</a>
    <a href="modules/kargolar">🚚 Kargolar</a>
    <a href="modules/users">👥 Kullanıcılar</a>
    <a href="modules/ayarlar">⚙️ Ayarlar</a>
    <a href="terminal">🔍 Terminal</a>
    <a href="logout.php">🚪 Çıkış</a>
</div>

<div class="content">
