<?php

use App\Libraries\Hash;
?>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main">
    <div class="row pt-3">
        <div class="col-12 text-center">
            <h3>Welcome TO Karimnagar VRS Authenticator</h3>
            <h5>Karimnagar,Hanmkonda</h5>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col col-8">
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
                            <form action="<?= site_url() ?>dashboard/<?= Hash::path('addAction') ?>" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                                <div class="col-10">
                                    <div class="form-group mt-3">
                                        <label for="empId" class="form-label">Employee Id</label>
                                        <input type="text" name="empId" class="form-control" id="empId" placeholder="" value="<?= set_value('empId') ?>">
                                        <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'empId') : '' ?></small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="fullname" class="form-label">Name of the ex-employee retired under MVRS, 2022 of AJ Mill</label>
                                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="" value="<?= set_value('fullname') ?>">
                                        <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'fullname') : '' ?></small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="fname" class="form-label">Father / Husband Name</label>
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="" value="<?= set_value('fname') ?>">
                                        <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'fname') : '' ?></small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="address" class="form-label">Residential Address</label>
                                        <textarea class="form-control" name="address" id="address" rows="5" placeholder=""><?= set_value('address') ?></textarea>
                                        <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'address') : '' ?></small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="email" class="form-label">Email Address if any</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="" value="<?= set_value('email') ?>">
                                        <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'email') : '' ?></small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="phone" class="form-label">Phone / Mobile number</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="" value="<?= set_value('phone') ?>">
                                        <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'phone') : '' ?></small>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="aadhar" class="form-label">Aadhar Card</label>
                                        <input type="radio" class="form-check-input" name="aadhar_radio" id="aadhar_yes" value="Yes">Yes
                                        <input type="radio" class="form-check-input" name="aadhar_radio" id="aadhar_no" value="No" checked>No
                                        <div id="aadhar" style="display: none;">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="<?= site_url() ?><?= $registeredData['aadhar'] ?>" alt="" class="img-fluid w-50" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="default" id="aadhar" name="aadhar" />
                                                </span>
                                            </div>
                                            <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'aadhar') : '' ?></small>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="relieving" class="form-label">Relieving order of the ex-employees Departname, Designation, Token No.</label>
                                        <input type="radio" class="form-check-input" name="relieving_radio" id="relieving_yes" value="Yes">Yes
                                        <input type="radio" class="form-check-input" name="relieving_radio" id="relieving_no" value="No" checked>No
                                        <div id="relieving" style="display: none;">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="<?= site_url() ?><?= $registeredData['relieving'] ?>" alt="" class="img-fluid w-50" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="default" id="relieving" name="relieving" />
                                                </span>
                                            </div>
                                            <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'relieving') : '' ?></small>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="payslip" class="form-label">Last drawn pay slip of ex-employee</label>
                                        <input type="radio" class="form-check-input" name="payslip_radio" id="payslip_yes" value="Yes">Yes
                                        <input type="radio" class="form-check-input" name="payslip_radio" id="payslip_no" value="No" checked>No
                                        <div id="payslip" style="display: none;">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="<?= site_url() ?><?= $registeredData['payslip'] ?>" alt="" class="img-fluid w-50" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="default" id="payslip" name="payslip" />
                                                </span>
                                            </div>
                                            <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'payslip') : '' ?></small>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="identitycard" class="form-label">Identity Card issued by A.J.Mills</label>
                                        <input type="radio" class="form-check-input" name="identitycard_radio" id="identitycard_yes" value="Yes">Yes
                                        <input type="radio" class="form-check-input" name="identitycard_radio" id="identitycard_no" value="No" checked>No
                                        <div id="identitycard" style="display: none;">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="<?= site_url() ?><?= $registeredData['identitycard'] ?>" alt="" class="img-fluid w-50" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="default" id="identitycard" name="identitycard" />
                                                </span>
                                            </div>
                                            <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'identitycard') : '' ?></small>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="pensionorder" class="form-label">Pension order issued bu the A.J.Mills</label>
                                        <input type="radio" class="form-check-input" name="pensionorder_radio" id="pensionorder_yes" value="Yes">Yes
                                        <input type="radio" class="form-check-input" name="pensionorder_radio" id="pensionorder_no" value="No" checked>No
                                        <div id="pensionorder" style="display: none;">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="<?= site_url() ?><?= $registeredData['pensionorder'] ?>" alt="" class="img-fluid w-50" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="default" id="pensionorder" name="pensionorder" />
                                                </span>
                                            </div>
                                            <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'pensionorder') : '' ?></small>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="esipf" class="form-label">ESI/PF No. etc, issued by A.J.Mills</label>
                                        <input type="radio" class="form-check-input" name="esipf_radio" id="esipf_yes" value="Yes">Yes
                                        <input type="radio" class="form-check-input" name="esipf_radio" id="esipf_no" value="No" checked>No
                                        <div id="esipf" style="display: none;">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="<?= site_url() ?><?= $registeredData['esipf'] ?>" alt="" class="img-fluid w-50" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <span class="btn btn-theme02 btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select image</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" class="default" id="esipf" name="esipf" />
                                                </span>
                                            </div>
                                            <small class="text-danger"><?= !empty(session()->getFlashdata('validation')) ? display_error(session()->getFlashdata('validation'), 'esipf') : '' ?></small>
                                        </div>
                                    </div>
                                    <input type="hidden" name="auth_id" id="auth_id" value="<?= session()->getFlashdata('auth_id') ?>">
                                    <div class="text-center"><button type="submit" class="btn btn-success">Save</button></div>
                                </div>
                            </form>
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
        $("#aadhar_yes").click(function() {
            if ($(this).is(":checked")) {
                $("#aadhar").show();
            }
        });
        $("#aadhar_no").click(function() {
            if ($(this).is(":checked")) {
                $("#aadhar").hide();
            }
        });
        $("#relieving_yes").click(function() {
            if ($(this).is(":checked")) {
                $("#relieving").show();
            }
        });
        $("#relieving_no").click(function() {
            if ($(this).is(":checked")) {
                $("#relieving").hide();
            }
        });
        $("#payslip_yes").click(function() {
            if ($(this).is(":checked")) {
                $("#payslip").show();
            }
        });
        $("#payslip_no").click(function() {
            if ($(this).is(":checked")) {
                $("#payslip").hide();
            }
        });
        $("#identitycard_yes").click(function() {
            if ($(this).is(":checked")) {
                $("#identitycard").show();
            }
        });
        $("#identitycard_no").click(function() {
            if ($(this).is(":checked")) {
                $("#identitycard").hide();
            }
        });
        $("#pensionorder_yes").click(function() {
            if ($(this).is(":checked")) {
                $("#pensionorder").show();
            }
        });
        $("#pensionorder_no").click(function() {
            if ($(this).is(":checked")) {
                $("#pensionorder").hide();
            }
        });
        $("#esipf_yes").click(function() {
            if ($(this).is(":checked")) {
                $("#esipf").show();
            }
        });
        $("#esipf_no").click(function() {
            if ($(this).is(":checked")) {
                $("#esipf").hide();
            }
        });
    });
</script>