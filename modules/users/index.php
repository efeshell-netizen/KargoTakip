<?php
require_once "../../header.php";
require_role("user_manage");

$users = $db->query("SELECT u.*, s.sube_adi FROM users u 
LEFT JOIN subeler s ON s.id = u.sube_id ORDER BY u.id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="page-title">Kullanıcılar</div>

<a href="add.php" class="btn btn-primary mb-3">Yeni Kullanıcı Ekle</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ad Soyad</th>
            <th>Kullanıcı Adı</th>
            <th>Şube</th>
            <th>Rol</th>
            <th>Varsayılan Sayfa</th>
            <th>İşlem</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= $u['adsoyad'] ?></td>
            <td><?= $u['kullanici_adi'] ?></td>
            <td><?= $u['sube_adi'] ?></td>
            <td><?= strtoupper($u['rol']) ?></td>
            <td><?= $u['default_page'] ?></td>
            <td>
                <a href="edit.php?id=<?= $u['id'] ?>" class="btn btn-sm btn-warning">Düzenle</a>
                <a href="delete.php?id=<?= $u['id'] ?>" class="btn btn-sm btn-danger"
                   onclick="return confirm('Kullanıcı silinsin mi?')">Sil</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once "../../footer.php"; ?>
