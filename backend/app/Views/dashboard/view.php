<?php

use App\Libraries\Hash;

?>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <?= view('common/header') ?>
    <?= view('common/aside') ?>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-8 d-flex no-block align-items-center">
                    <h4 class="page-title"><?= $pageHeading ?></h4>
                </div>
                <div class="col-4 d-flex no-block align-items-center">
                    <a href="<?= site_url() ?>dashboard/<?= Hash::path('add') ?>">Register</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <?= csrf_field(); ?>
                            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                            <?php elseif (!empty(session()->getFlashdata('success'))) : ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                            <?php endif ?>
                        </div>
                        <div class="card-body">
                            <div class="adv-table">
                                <table id="zero_config" class="table table-striped table-bordered w-100 d-md-table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Father / Husband</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th class="none">Residential Address</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($registeredData as $index => $row) {
                                        ?>
                                            <tr>
                                                <td><?= $index + 1 ?> </td>
                                                <td><?= $row['fullname'] ?> </td>
                                                <td><?= $row['fname'] ?> </td>
                                                <td><?= $row['email'] ?> </td>
                                                <td><?= $row['phone'] ?> </td>
                                                <td><?= $row['address'] ?> </td>
                                                <td>
                                                    <button type="button" id="edit" class="btn btn-cyan btn-sm rounded text-white edit" value='{"register_id" :"<?= $row['register_id'] ?>"}'> Edit </button>
                                                    <button type="button" class="btn btn-danger btn-sm rounded text-white delete" value='{"register_id" :"<?= $row['register_id'] ?>"}'> Delete </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Father / Husband</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th class="none">Residential Address</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('common/footer') ?>
</div>
<script src="<?= site_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on("click", ".edit", function(e) {
            var data = $(this);
            var values = JSON.parse(data.val());
            var register_id = values.register_id;
            location.replace("<?= site_url() ?>dashboard/<?= Hash::path('edit') ?>/" + register_id);
        });
        $(document).on("click", ".delete", function(e) {
            var data = $(this);
            var values = JSON.parse(data.val());
            var register_id = values.register_id;
            location.replace("<?= site_url() ?>dashboard/<?= Hash::path('delete') ?>/" + register_id);
        });
    });
</script>