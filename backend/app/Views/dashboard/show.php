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
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-head">
                        </div>
                        <?php

                        use App\Libraries\Hash;

                        if (empty($registeredData)) {
                        ?>
                            <div class="card-body">
                                <h3 class="text-center">Data Not Match</h3>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="card-body">
                                <div class="col-10">
                                    <div class="form-group mt-3">
                                        <label for="fullname" class="form-label">Name of the ex-employee retired under MVRS, 2022 of AJ Mill:</label>
                                        <label class="ms-3 h5"><?= $registeredData['fullname'] ?></label>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="fname" class="form-label">Father / Husband Name:</label>
                                        <label class="ms-3 h5"><?= $registeredData['fname'] ?></label>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="address" class="form-label">Residential Address:</label>
                                        <label class="ms-3 h5"><?= $registeredData['address'] ?></label>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="email" class="form-label">Email Address if any:</label>
                                        <label class="ms-3 h5"><?= $registeredData['email'] ?></label>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="phone" class="form-label">Phone / Mobile number:</label>
                                        <label class="ms-3 h5"><?= $registeredData['phone'] ?></label>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="aadhar" class="form-label">Aadhar Card:</label>
                                        <label class="ms-3 h5"><?= $registeredData['aadhar_radio'] ?></label>
                                        <?php
                                        if ($registeredData['aadhar_radio'] == "Yes") {
                                        ?>
                                            <img src="<?= site_url() ?><?= $registeredData['aadhar'] ?>" class="img-fluid w-25">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="relieving" class="form-label">Relieving order of the ex-employees Departname, Designation, Token No:</label>
                                        <label class="ms-3 h5"><?= $registeredData['relieving_radio'] ?></label>
                                        <?php
                                        if ($registeredData['relieving_radio'] == "Yes") {
                                        ?>
                                            <img src="<?= site_url() ?><?= $registeredData['relieving'] ?>" class="img-fluid w-25">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="payslip" class="form-label">Last drawn pay slip of ex-employee:</label>
                                        <label class="ms-3 h5"><?= $registeredData['payslip_radio'] ?></label>
                                        <?php
                                        if ($registeredData['payslip_radio'] == "Yes") {
                                        ?>
                                            <img src="<?= site_url() ?><?= $registeredData['payslip'] ?>" class="img-fluid w-25">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="identitycard" class="form-label">Identity Card issued by A.J.Mills:</label>
                                        <label class="ms-3 h5"><?= $registeredData['identitycard_radio'] ?></label>
                                        <?php
                                        if ($registeredData['identitycard_radio'] == "Yes") {
                                        ?>
                                            <img src="<?= site_url() ?><?= $registeredData['identitycard'] ?>" class="img-fluid w-25">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="pensionorder" class="form-label">Pension order issued bu the A.J.Mills:</label>
                                        <label class="ms-3 h5"><?= $registeredData['pensionorder_radio'] ?></label>
                                        <?php
                                        if ($registeredData['pensionorder_radio'] == "Yes") {
                                        ?>
                                            <img src="<?= site_url() ?><?= $registeredData['pensionorder'] ?>" class="img-fluid w-25">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="esipf" class="form-label">ESI/PF No. etc, issued by A.J.Mills:</label>
                                        <label class="ms-3 h5"><?= $registeredData['esipf_radio'] ?></label>
                                        <?php
                                        if ($registeredData['esipf_radio'] == "Yes") {
                                        ?>
                                            <img src="<?= site_url() ?><?= $registeredData['esipf'] ?>" class="img-fluid w-25">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="button" id="edit" class="btn btn-cyan btn-sm rounded text-white edit" value='{"register_id" :"<?= $registeredData['register_id'] ?>"}'> Edit </button>
                                <button type="button" class="btn btn-danger btn-sm rounded text-white delete" value='{"register_id" :"<?= $registeredData['register_id'] ?>"}'> Delete </button>
                            </div>
                        <?php
                        }
                        ?>
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