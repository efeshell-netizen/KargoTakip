<?php
include "config.php";

if (isset($_POST["login"])) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $q = $db->prepare("SELECT * FROM users WHERE username=? AND password=? LIMIT 1");
    $q->execute([$user, md5($pass)]);
    $check = $q->fetch(PDO::FETCH_ASSOC);

    if ($check) {
        $_SESSION["login"] = true;
        $_SESSION["user"] = $check;
        header("Location: index.php");
        exit();
    } else {
        $error = "Hatalı kullanıcı adı veya şifre!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>KadirX Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: <?= $settings["login_bg"]; ?>;
        }
        .login-box {
            max-width: 430px;
            margin: 100px auto;
            padding: 35px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px #00000015;
        }
    </style>
</head>

<body>
<div class="login-box">
    <h3 class="text-center mb-4">KadirX Kargo Takip</h3>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?= $error; ?></div>
    <?php } ?>

    <form method="POST">
        <label>Kullanıcı Adı</label>
        <input type="text" name="user" class="form-control" required>

        <label class="mt-3">Şifre</label>
        <input type="password" name="pass" class="form-control" required>

        <button class="btn btn-primary w-100 mt-4" name="login">Giriş Yap</button>
    </form>
</div>

</body>
</html>
