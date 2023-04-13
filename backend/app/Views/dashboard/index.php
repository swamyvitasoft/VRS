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
                        <div class="card-head">
                            <?= csrf_field(); ?>
                            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                            <?php elseif (!empty(session()->getFlashdata('success'))) : ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                            <?php endif ?>
                        </div>
                        <div class="card-body">
                            <div class="col-3">
                                <div class="form-group mt-3">
                                    <label for="register_id" class="form-label">Secret Code</label>
                                    <input type="text" name="register_id" class="form-control register_id" id="register_id" placeholder="" value="<?= set_value('register_id') ?>">
                                    <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'register_id') : '' ?></small>
                                </div>
                            </div>
                            <div class="col-3">
                            </div>
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
        $(document).on("blur", ".register_id", function(e) {
            var register_id = $(this).val();
            location.replace("<?= site_url() ?>dashboard/<?= Hash::path('show') ?>/" + register_id);
        });
    });
</script>