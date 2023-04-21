<?php

use App\Libraries\Hash;

$data = session()->getFlashdata('data');
$data = explode("@", '' . $data);
?>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main">
    <?= view('common/header1') ?>
    <div class="page-wrapper pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?= csrf_field(); ?>
                    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                    <?php elseif (!empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                    <?php endif ?>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body mx-auto d-block">
                            <form action="<?= site_url() ?>dashboard/<?= Hash::path('regAction') ?>" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                                <input type="text" name="eId" class="form-control eId" id="eId" placeholder="Employee Id" required>
                                <textarea id="tmplval" name="tmplval" cols="100" rows="10" style="display: none;"></textarea>
                                <input type="hidden" name="serialNumber" id="serialNumber">
                                <input type="hidden" name="imageHeight" id="imageHeight">
                                <input type="hidden" name="imageWidth" id="imageWidth">
                                <input type="hidden" name="imageDPI" id="imageDPI">
                                <input type="hidden" name="nFIQ" id="nFIQ">
                                <textarea id="templateBase64" name="templateBase64" cols="100" rows="10" style="display: none;"></textarea>
                                <textarea id="isoImgBase64" name="isoImgBase64" cols="100" rows="10" style="display: none;"></textarea>
                                <input type="hidden" name="sessionKey" id="sessionKey">
                                <textarea id="encryptedPidXml" name="encryptedPidXml" cols="100" rows="10" style="display: none;"></textarea>
                                <input type="hidden" name="encryptedHmac" id="encryptedHmac">
                                <input type="hidden" name="clientIP" id="clientIP">
                                <input type="hidden" name="timestamp" id="timestamp">
                                <input type="hidden" name="fdc" id="fdc">
                                <button type="submit" class="btn btn-success btn-lg rounded text-white mt-3" id="next" style="display: none;">Next</button>
                            </form>
                            <button type="button" class="btn btn-cyan btn-lg rounded text-white mt-3" id="register" onclick="captureFP()"> Registration </button>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                <img id="FPImage1" alt="Fingerpint Image" src="<?= site_url() ?>assets/images/finger.jpg" class="img img-fluid rounded mx-auto d-block">
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body mx-auto d-block">
                            <form action="<?= site_url() ?>dashboard/<?= Hash::path('logAction') ?>" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                                <input type="text" name="empId" class="form-control empId" id="empId" placeholder="Employee Id" required value="<?= $data[0] ?>" <?= empty($data[0]) ? '' : 'readonly' ?>>
                                <button type="submit" class="btn btn-success btn-lg rounded text-white mt-3" id="show" style="display: none;">Show My Data</button>
                            </form>
                            <textarea id="tmplval1" name="tmplval1" cols="100" rows="10" style="display: none;"><?= $data[1] ?></textarea>
                            <button type="button" class="btn btn-primary btn-lg rounded text-white mt-3" id="login" onclick="MatchFP()" style="display: <?= empty($data[0]) ? 'none' : 'block' ?>;"> Authentication </button>
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
        $(document).on("blur", ".empId", function(e) {
            var empId = $(this).val();
            if(empId.trim().length === 0){
            alert("Please Enter Employee ID");
            }
            else{
                location.replace("<?= site_url() ?>dashboard/<?= Hash::path('auth') ?>/" + empId);
            }
        });
    });
</script>
<script>
    function captureFP() {
        jsonp("http://localhost:8090/FM220/gettmpl?callback=?",
            function(result) {
                SuccessFunc(result);
            });
    }

    function MatchFP() {
        jsonp("http://localhost:8090/FM220/GetMatchResult?MatchTmpl=" + encodeURIComponent(document.getElementById("tmplval1").value.toString()) + "&callback=?",
            function(result) {
                SuccessMatch(result);
            });
    }

    function jsonp(url, callback) {
        var id = "_" + (new Date()).getTime();
        window[id] = function(result) {
            if (callback)
                callback(result);
            var sc = document.getElementById(id);
            sc.parentNode.removeChild(sc);
            window[id] = null;
        }
        url = url.replace("callback=?", "callback=" + id);
        var script = document.createElement("script");
        script.setAttribute("id", id);
        script.setAttribute("src", url);
        script.onerror = ErrorFunc;
        script.setAttribute("type", "text/javascript");
        document.body.appendChild(script);
    }

    function SuccessFunc(result) {
        if (result.errorCode == 0) {
            if (result != null && result.bMPBase64.length > 0) {
                document.getElementById("FPImage1").src = "data:image/bmp;base64," + result.bMPBase64;
            }
            document.getElementById("tmplval").value = result.templateBase64;
            document.getElementById("serialNumber").value = result.serialNumber;
            document.getElementById("imageHeight").value = result.imageHeight;
            document.getElementById("imageWidth").value = result.imageWidth;
            document.getElementById("imageDPI").value = result.imageDPI;
            document.getElementById("nFIQ").value = result.nFIQ;
            document.getElementById("templateBase64").value = result.templateBase64;
            document.getElementById("isoImgBase64").value = result.isoImgBase64;
            document.getElementById("sessionKey").value = result.sessionKey;
            document.getElementById("encryptedPidXml").value = result.encryptedPidXml;
            document.getElementById("encryptedHmac").value = result.encryptedHmac;
            document.getElementById("clientIP").value = result.clientIP;
            document.getElementById("timestamp").value = result.timestamp;
            document.getElementById("fdc").value = result.fdc;
            document.getElementById("register").style.display = "none";
            document.getElementById("next").style.display = "block";
            document.getElementById("eId").readOnly = true;
        } else {
            alert("Fingerprint Capture ErrorCode " + result.errorCode + "Desc :-" + result.status);
        }
    }

    function SuccessMatch(result) {
        if (result.errorCode == 0) {
            if (result != null && result.bMPBase64.length > 0) {
                document.getElementById("FPImage1").src = "data:image/bmp;base64," + result.bMPBase64;
            }
            document.getElementById("login").style.display = "none";
            document.getElementById("show").style.display = "block";
        } else {
            alert("Fingerprint Capture ErrorCode " + result.errorCode + "Desc :-" + result.status);
        }
    }

    function ErrorFunc(status) {
        alert("Check if ACPL FM220 service is running ");
    }
</script>