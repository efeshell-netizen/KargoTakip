<?php include "header.php"; ?>

<h2>📦 Hoş Geldin, <?= $_SESSION["user"]["username"]; ?></h2>
<p>KadirX Kargo Takip Yönetim Paneline hoş geldiniz.</p>

<div class="row mt-4">

    <div class="col-md-3">
        <div class="card p-4 text-center">
            <h4>Cariler</h4>
            <a href="modules/cariler" class="btn btn-primary mt-3">Git</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-4 text-center">
            <h4>Raporlar</h4>
            <a href="modules/raporlar" class="btn btn-primary mt-3">Git</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-4 text-center">
            <h4>Kargolar</h4>
            <a href="modules/kargolar" class="btn btn-primary mt-3">Git</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-4 text-center">
            <h4>Terminal</h4>
            <a href="terminal" class="btn btn-primary mt-3">Git</a>
        </div>
    </div>

</div>

<?php include "footer.php"; ?>
