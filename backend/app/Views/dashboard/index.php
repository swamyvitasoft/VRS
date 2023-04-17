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
    <div class="page-wrapper pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <?= csrf_field(); ?>
                            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                            <?php elseif (!empty(session()->getFlashdata('success'))) : ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                            <?php endif ?>
                        </div>
                        <div class="card-body mx-auto d-block">
                            <button type="button" id="register" class="btn btn-cyan btn-lg rounded text-white register" value='{"register" :"register"}'> Registration </button>
                            <label id="success"></label>
                            <form action="<?= site_url() ?>dashboard/<?= Hash::path('authAction') ?>" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                                <textarea id="pdata" name="pdata" cols="250" rows="30" style="display: none;"></textarea>
                                <input type="submit" value="submit" class="btn btn-success btn-lg rounded text-white success1">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body mx-auto d-block">
                            <button type="button" id="login" class="btn btn-primary btn-lg rounded text-white login" value='{"login" :"login"}'> Authentication </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('common/footer') ?>
</div>
<script src="<?= site_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= site_url() ?>assets/custom-libs/xml2json.js"></script>
<script>
    $(document).ready(function() {
        $(".success1").hide();
        $(document).on("click", ".register", function(e) {
            var port;
            var urlStr = '';
            urlStr = 'http://localhost:11100/rd/capture';
            getJSONCapture(urlStr,
                function(err, data) {
                    if (err != null) {
                        alert('Something went wrong: ' + err);
                    } else {
                        var x2js = new X2JS();
                        $(".register").hide();
                        $(".success1").show();
                        $("#pdata").val(JSON.stringify(x2js.xml_str2json(data)));
                    }
                }
            );
        });
        var getJSONCapture = function(url, callback) {
            var xhr = new XMLHttpRequest();
            xhr.open('CAPTURE', url, true);
            xhr.responseType = 'text'; //json
            var InputXml = "<PidOptions> <Opts fCount=\"1\" fType=\"0\" iCount=\"0\" pCount =\"0\" format=\"0\" pidVer=\"2.0\" timeout=\"20000\" otp=\"\" posh =\"UNKNOWN\" env=\"S\" wadh=\"\" /> <Demo></Demo> <CustOpts> <Param name =\"ValidationKey\" value=\"\" /> </CustOpts> </PidOptions>";
            xhr.onload = function() {
                var status = xhr.status;
                if (status == 200) {
                    callback(null, xhr.response);
                } else {
                    callback(status);
                }
            };
            xhr.send(InputXml);
        };
        $(document).on("click", ".login", function(e) {
            alert('Login');
        });
    });
</script>