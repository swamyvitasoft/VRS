<?php

use App\Libraries\Hash;
?>
<div class="row pt-3">
    <div class="col-9 text-center">
        <h3>MODIFIED VOLUNTARY RETIREMENT SCHEME -2022 OF AZAM MILL WORKERS</h3>
        <h5>(318) EX-EMPLOYEES OF A MILL COVERED UNDER HON'BLE SUPREM COURT OF INDIA ORADER DATED 26-10-2021</h5>
    </div>
    <?php
    if (!empty($loggedInfo['login_id'])) {
    ?>
        <div class="col-3">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item"><a class="btn btn-primary" href="<?= site_url() ?>dashboard/<?= Hash::path('index') ?>"><i class="fa fa-home me-1 ms-1"></i>Home</a></li>
                <li class="list-group-item"><a class="btn btn-primary" href="<?= site_url() ?>dashboard/<?= Hash::path('view') ?>"><i class="fa fa-list me-1 ms-1"></i>List</a></li>
                <li class="list-group-item"><a class="btn btn-danger" href="<?= site_url() ?>logout"><i class="fa fa-power-off me-1 ms-1"></i>Logout</a></li>
            </ul>
        </div>
    <?php
    }
    ?>
</div>