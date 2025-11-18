<?php
// SYSTEM CONFIG
ob_start();
session_start();

// DATABASE
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "kadirx_kargotakip";

// CONNECT
try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB CONNECTION FAILED: " . $e->getMessage());
}

// SYSTEM SETTINGS (THEME, LOGO, COLORS)
$settings = $db->query("SELECT * FROM ayarlar LIMIT 1")->fetch(PDO::FETCH_ASSOC);

// DEFAULT SETTINGS IF EMPTY
if (!$settings) {
    $settings = [
        "logo" => "assets/img/logo.png",
        "theme_color" => "#0051ff",
        "login_bg" => "#f1f1f1"
    ];
}
?>
