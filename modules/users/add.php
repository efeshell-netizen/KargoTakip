<?php
require_once "../../header.php";
require_role("user_manage");

$subeler = $db->query("SELECT * FROM subeler ORDER BY sube_adi")->fetchAll(PDO::FETCH_ASSOC);

if($_POST){
    $adsoyad      = $_POST["adsoyad"];
    $kadi         = $_POST["kullanici_adi"];
    $sifre        = password_hash($_POST["sifre"], PASSWORD_DEFAULT);
    $rol          = $_POST["rol"];
    $sube_id      = $_POST["sube_id"];
    $default_page = $_POST["default_page"];
    $permissions  = json_encode($_POST["permissions"]);

    $q = $db->prepare("INSERT INTO users SET
        adsoyad=?, kullanici_adi=?, sifre=?, rol=?, sube_id=?, default_page=?, permissions=?");
    $q->execute([$adsoyad,$kadi,$sifre,$rol,$sube_id,$default_page,$permissions]);

    header("Location: index.php");
    exit;
}
?>

<div class="page-title">Yeni Kullanıcı</div>

<form method="post">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Ad Soyad</label>
            <input type="text" name="adsoyad" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Kullanıcı Adı</label>
            <input type="text" name="kullanici_adi" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Şifre</label>
            <input type="password" name="sifre" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Şube</label>
            <select name="sube_id" class="form-control" required>
                <?php foreach($subeler as $s): ?>
                    <option value="<?= $s['id'] ?>"><?= $s['sube_adi'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Rol</label>
            <select name="rol" class="form-control">
                <option value="personel">Personel</option>
                <option value="sube">Şube Yöneticisi</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Varsayılan Açılacak Sayfa</label>
            <select name="default_page" class="form-control">
                <option value="terminal">Terminal</option>
                <option value="dashboard">Dashboard</option>
                <option value="cariler">Cariler</option>
                <option value="raporlar">Raporlar</option>
            </select>
        </div>

        <div class="col-md-12 mt-4">
            <h5>Kullanıcı Yetkileri</h5>

            <?php
            $yetkiler = [
                "terminal_view" => "Terminal Görüntüleme",
                "cariler_view"  => "Carileri Görme",
                "cariler_edit"  => "Cari Düzenleme / Excel Yükleme",
                "kargo_manage"  => "Kargo Firmaları Yönetimi",
                "rapor_view"    => "Raporlar",
                "ayarlar_manage"=> "Ayarları Yönetme",
                "user_manage"   => "Kullanıcı Yönetimi",
                "mail_template_manage" => "E-posta Şablonları"
            ];
            ?>

            <div class="row">
                <?php foreach($yetkiler as $k=>$v): ?>
                    <div class="col-md-4 mb-2">
                        <label>
                            <input type="checkbox" name="permissions[]" value="<?= $k ?>">
                            <?= $v ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-12 mt-4">
            <button class="btn btn-success">Kaydet</button>
        </div>
    </div>
</form>

<?php require_once "../../footer.php"; ?>
