<?php
include "includes/userheader.php";

include("includes/db.php");

if (isset($_POST['btnAddAmount'])) {
    $total = 0;
    $ID = 1;
    $query = "SELECT * FROM user_amounts WHERE auserid = '" . $_SESSION["User_ID"] . "' ORDER BY aid DESC";
    $sql = mysqli_query($con, $query);
    $row = mysqli_fetch_array($sql);
    if (mysqli_num_rows($sql) > 0) {
        $total = $row["atotalamount"] + $_REQUEST["aamount"];
        // $ID = $row["aid"] + 1;
    } else {
        $total = $_REQUEST["aamount"];
    }
    $lastquery = "SELECT * FROM user_amounts ORDER BY aid DESC";
    $lastsql = mysqli_query($con, $lastquery);
    $lastrow = mysqli_fetch_array($lastsql);
    $ID = $lastrow["aid"] + 1;

    $path = $_FILES['aattachment']['name'];
    $path_tmp = $_FILES['aattachment']['tmp_name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $file_name = basename($path, '.' . $ext);
    $final_name = 'file-' . $ID . '.' . $ext;

    $iquery = "INSERT INTO `user_amounts`(`auserid`,  `aaccount`, `adate`,`atime`,`aamount`, `atotalamount`, `aattachment`, `anote`) VALUES 
                     ('" . $_SESSION["User_ID"] . "','" . $_REQUEST["aaccount"] . "','" . date("Y-m-d") . "','" . date("h:i:s") . "','" . $_REQUEST["aamount"] . "','0','" . $final_name . "','" . $_REQUEST["anote"] . "')";
    mysqli_query($con, $iquery);

    $iquery = "INSERT INTO `user_amounts_history`(`auserid`,  `aaccount`, `adate`,`atime`,`aamount`, `aattachment`, `anote`) VALUES 
                     ('" . $_SESSION["User_ID"] . "','" . $_REQUEST["aaccount"] . "','" . date("Y-m-d") . "','" . date("h:i:s") . "','" . $_REQUEST["aamount"] . "','" . $final_name . "','" . $_REQUEST["anote"] . "')";
    mysqli_query($con, $iquery);
    move_uploaded_file($path_tmp, 'assets/images/amountslips/' . $final_name);
    // exit;
    echo "<script>window.location='deposit.php?Err=addedamount'</script>";
}

?>

<div class="container-fluid">
    <div class="layout-specing">
        <?php if(isset($_REQUEST["Err"])){ ?>
            <div class="col-12">
                <?php
                if($_REQUEST["Err"] == "addedamount")
                {
                    ?>
                    <br>
                    <div class="badge rounded-pill bg-success" role="alert" style="padding: 15px; font-size: 16px;">
                        <p><b>SUCCESS!</b> New Amount Request Sent to Admin. After Admin verification Amount will be added to your Account.</p>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Withdraw Money</h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="index.html">Site1</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Blank Page</li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card border-0 rounded shadow p-4">
                    <h5 class="mb-0 mb-3">Upgrade/Select Your Package</h5>
                    <!-- <p class="text-muted mb-0">    <span class="text-warning m-4">(Deposit your payments to this bank.)</span></p>
                    <p class="text-muted mb-0">Bank Name:<span class="text-warning m-5">xyz bank</span></p>
                    <p class="text-muted mb-0">Bank Account: <span> <input type="number"  class="form-control" style="width: 100px;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> </span></p> -->
                    <form method="post" enctype="multipart/form-data" name="UpgradeForm">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Bank Details: </label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext"  name="aaccount" id="staticEmail"
                                       value="(Deposit your payments to this bank.)">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Bank Name:</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                       value="XYZ bank">
                            </div>
                        </div>
                        <br>

                        <div class="input-group">
                            <label for="accountNo" class="col-sm-2 col-form-label">Account No.</label>
                            <div class="custom-file">
                                <input type="text"  class="custom-file-input" value="" id="accountno">
                                <button type="button" onclick="copyInformationText('accountno')" class="btn btn-danger">copy</button>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Receiver Mobile No & EasyPaisa
                                Account Number for Deposit:</label>
                            <div class="custom-file">
                                <input type="text" class="custom-file-input " value="" id="easypaisa">
                                <button type="button" class="btn btn-danger" onclick="copyInformationText('easypaisa')">copy</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div><!--end col-->
        .
        <div class="col-md-7 col-lg-8 mt-4">
            <div class="card rounded shadow p-4 border-0">
                <h4 class="mb-3">Deposit as much as you want</h4>
                <form  name="UpgradeForm" method="post" enctype="multipart/form-data">
                    <div class="row g-3">


                        <div class="col-12">
                            <label for="email" class="form-label">Sender Account No. </label>
                            <input type="text"  name="aaccount" class="form-control" id="aacount" placeholder="Sender Account No. ">
                            <div class="invalid-feedback">
                                Sender Account No.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="amount" class="form-label">Amount
                            </label>
                            <input type="text" class="form-control" name="aamount" id="email" placeholder="Amount">
                            <div class="invalid-feedback">
                                Amount
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Attachment
                                <span
                                        class="text-muted">(Screenshot of the transaction)</span>
                            </label>
                            <input type="file" class="form-control" name="aattachment" id="address" placeholder="1234 Main St"
                                   required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Transaction ID
                            </label>
                            <input type="text" class="form-control" id="email" name="anote" placeholder="Transaction ID">
                            <div class="invalid-feedback">
                                Transaction ID
                            </div>
                        </div>


                        <button class="w-100 btn btn-danger" name="btnAddAmount" id="btnAddAmount" type="submit"> SEND PAYMENT REQUEST</button>
                </form>
            </div>
        </div><!--end col-->
    </div><!--end row-->
</div><!--end row-->

</div>

</div><!--end container-->

<!-- Footer Start -->
<footer class="bg shadow py-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col">
                <div class="text-sm-start text-center">
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<!-- End -->
</main>
<!--End page-content" -->
</div>
<!-- page-wrapper -->

<!-- Offcanvas Start -->
<div class="offcanvas offcanvas-end bg-white shadow" tabindex="-1" id="offcanvasRight"
     aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
        <h5 id="offcanvasRightLabel" class="mb-0">
            <img src="assets/images/logo-dark.png" height="24" class="light-version" alt="">
            <img src="assets/images/logo-light.png" height="24" class="dark-version" alt="">
        </h5>
        <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas"
                aria-label="Close"><i class="mdi mdi-close fs-4"></i></button>
    </div>
    <div class="offcanvas-body p-4 px-md-5">
        <div class="row">
            <div class="col-12">
                <!-- Style switcher -->
                <div id="style-switcher">
                    <div>
                        <ul class="text-center list-unstyled mb-0">
                            <li class="d-grid"><a href="javascript:void(0)" class="rtl-version t-rtl-light"
                                                  onclick="setTheme('style-rtl')"><img src="assets/images/demos/rtl.png"
                                                                                       class="img-fluid rounded-md shadow-md d-block"
                                                                                       alt=""><span
                                            class="text-muted mt-2 d-block">RTL Version</span></a></li>
                            <li class="d-grid"><a href="javascript:void(0)" class="ltr-version t-ltr-light"
                                                  onclick="setTheme('style')"><img src="assets/images/demos/ltr.png"
                                                                                   class="img-fluid rounded-md shadow-md d-block"
                                                                                   alt=""><span
                                            class="text-muted mt-2 d-block">LTR Version</span></a></li>
                            <li class="d-grid"><a href="javascript:void(0)" class="dark-rtl-version t-rtl-dark"
                                                  onclick="setTheme('style-dark-rtl')"><img
                                            src="assets/images/demos/dark-rtl.png"
                                            class="img-fluid rounded-md shadow-md d-block" alt=""><span
                                            class="text-muted mt-2 d-block">RTL Version</span></a></li>
                            <li class="d-grid"><a href="javascript:void(0)" class="dark-ltr-version t-ltr-dark"
                                                  onclick="setTheme('style-dark')"><img
                                            src="assets/images/demos/dark.png"
                                            class="img-fluid rounded-md shadow-md d-block" alt=""><span
                                            class="text-muted mt-2 d-block">LTR Version</span></a></li>
                            <li class="d-grid"><a href="javascript:void(0)" class="dark-version t-dark mt-4"
                                                  onclick="setTheme('style-dark')"><img
                                            src="assets/images/demos/dark.png"
                                            class="img-fluid rounded-md shadow-md d-block" alt=""><span
                                            class="text-muted mt-2 d-block">Dark Version</span></a></li>
                            <li class="d-grid"><a href="javascript:void(0)" class="light-version t-light mt-4"
                                                  onclick="setTheme('style')"><img src="assets/images/demos/ltr.png"
                                                                                   class="img-fluid rounded-md shadow-md d-block"
                                                                                   alt=""><span
                                            class="text-muted mt-2 d-block">Light Version</span></a></li>
                            <li class="d-grid"><a href="../landing/index.php" target="_blank" class="mt-4"><img
                                            src="assets/images/demos/landing.png"
                                            class="img-fluid rounded-md shadow-md d-block" alt=""><span
                                            class="text-muted mt-2 d-block">Landing Demos</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- end Style switcher -->
            </div><!--end col-->
        </div>
    </div>

    <div class="offcanvas-footer p-3 border-top text-center">
        <ul class="list-unstyled social-icon mb-0">
            <li class="list-inline-item mb-0"><a href="https://1.envato.market/Site1" target="_blank" class="rounded"><i
                            class="ti ti-shopping-cart align-middle" title="Buy Now"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank"
                                                 class="rounded"><i class="ti ti-brand-dribbble align-middle"
                                                                    title="dribbble"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank"
                                                 class="rounded"><i class="ti ti-brand-facebook align-middle"
                                                                    title="facebook"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank"
                                                 class="rounded"><i class="ti ti-brand-instagram align-middle"
                                                                    title="instagram"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i
                            class="ti ti-brand-twitter align-middle" title="twitter"></i></a></li>
            <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i
                            class="ti ti-mail align-middle" title="email"></i></a></li>
            <li class="list-inline-item mb-0"><a href="https://shreethemes.in" target="_blank" class="rounded"><i
                            class="ti ti-world align-middle" title="website"></i></a></li>
        </ul><!--end icon-->
    </div>
</div>
<!-- Offcanvas End -->

<!-- javascript -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!-- simplebar -->
<script src="assets/js/simplebar.min.js"></script>
<!-- Icons -->
<script src="assets/js/feather.min.js"></script>
<!-- Main Js -->
<script src="assets/js/plugins.init.js"></script>
<script src="assets/js/app.js"></script>
<script type="text/javascript">

    function copyInformationText(id) {
        var copyText = document.getElementById(id);
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        if (id == "accountno") {
            alert("Receiver Account Number Copied.");
        } else {
            alert("Receiver Mobile Number Copied.");
        }
    }

</script>

</body>

</html>