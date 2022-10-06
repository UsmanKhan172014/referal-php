<?php
include("includes/db.php");

$Total_Earning = 0;

$query = "SELECT SUM(eamount) AS Total_Earning FROM user_earnings WHERE euserid = '" . $_SESSION["User_ID"] . "' AND etype = 'earning' ";
$sql = mysqli_query($con, $query); //echo $up;
$eanring_num = mysqli_num_rows($sql);
$eanring_row = mysqli_fetch_array($sql);
$Total_Earning = $Total_Earning + $eanring_row["Total_Earning"];

if (isset($_POST['btnCommissionWithdraw'])) {
    $queryWC = "SELECT * FROM withdraw WHERE w_user = '" . $_SESSION["User_ID"] . "' AND w_type = 'Commission' AND w_date = '" . date("Y-m-d") . "' ";
    $sqlWC = mysqli_query($con, $queryWC);
    if (mysqli_num_rows($sqlWC) > 0) {
        echo "<script>window.location='dashboard.php?Err=alreadywithdrawcom'</script>";
    } else {
        $iquery = "INSERT INTO `withdraw`(w_type, w_user, w_amounttype, w_account, w_amount, w_date, w_status) 
                          VALUES ('Commission','" . $_SESSION["User_ID"] . "','" . $_REQUEST["cWithdraw_type"] . "','" . $_REQUEST["caccount"] . "','" . $_REQUEST["cWith_Amount"] . "','" . Date("Y-m-d") . "','Pending')";
        mysqli_query($con, $iquery);

        $query = "SELECT * FROM user_earnings WHERE euserid = '" . $_SESSION["User_ID"] . "' AND etype = 'referral'";
        $sql = mysqli_query($con, $query); //echo $up;
        $referral_row = mysqli_fetch_array($sql);
        $referral_num = mysqli_num_rows($sql);

        $total = $referral_row["eamount"] - $_REQUEST["cWith_Amount"];
        $uquery = "UPDATE user_earnings SET
                               eamount = '" . $total . "',
                               edate = '" . Date("Y-m-d") . "'
                               WHERE eid = '" . $referral_row["eid"] . "'";
        mysqli_query($con, $uquery);

        echo "<script>window.location='commission-page.php?Err=withdrawamout'</script>";
    }
}

$query = "SELECT * FROM user_earnings WHERE euserid = '" . $_SESSION["User_ID"] . "' AND etype = 'referral'";
$sql = mysqli_query($con, $query); //echo $up;
$referral_row = mysqli_fetch_array($sql);
$referral_num = mysqli_num_rows($sql);

include "includes/userheader.php"
?>

<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h5 class="mb-0">Check Your Commission</h5>
            </div>


        </div>
        <br>
        <?php
        $query_ref = "SELECT SUM(aramount) AS Total_Com FROM referral_amounts_record WHERE arreceiver = '" . $_SESSION["User_ID"] . "' ";
        $result_ref = mysqli_query($con, $query_ref);
        $row_up = mysqli_fetch_array($result_ref);

        ?>

        <div class="row row-cols-xl-5 row-cols-md-2 row-cols-1">
            <div class="col mt-4">
                <a href="#!"
                   class="features feature-primary d-flex justify-content-between align-items-center bg-white rounded shadow p-3">
                    <div class="d-flex align-items-center">
                        <div class=" text-center rounded-pill">
                            <i class="uil uil-usd-circle fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-muted">Earned Commission</h6>
                            <p class="fs-5 text-dark fw-bold mb-0">
                                <span>PKR <?php if (isset($referral_row["eamount"])) {
                                        $total = $referral_row["eamount"];
                                    } else {
                                        $total = 0;
                                    }
                                    if ($total != "") echo $total; else echo "0"; ?></span></p>
                        </div>
                    </div>


                </a>
            </div><!--end col-->
            <?php
            $query_com = "SELECT SUM(w_amount) AS PaidCommission FROM withdraw WHERE w_user = '" . $_SESSION["User_ID"] . "' AND w_type = 'Commission' AND w_status = 'Send' ";
            $sql_com = mysqli_query($con, $query_com);
            $row_com = mysqli_fetch_array($sql_com);

            ?>
            <div class="col mt-4">
                <a href="#!"
                   class="features feature-primary d-flex justify-content-between align-items-center bg-white rounded shadow p-3">
                    <div class="d-flex align-items-center">
                        <div class=" text-center rounded-pill">
                            <i class="uil uil-usd-circle fs-4 mb-0"></i>
                        </div>
                        <div class="flex-1 ms-3">
                            <h6 class="mb-0 text-muted">Paid Commission</h6>
                            <p class="fs-5 text-dark fw-bold mb-0">
                                <span>PKR <?php $total_com = $row_com["PaidCommission"];
                                    if ($total_com != "") echo round($total_com); else echo "0"; ?></span></p>
                        </div>
                    </div>


                </a>
            </div>


        </div><!--end row-->

        <div class="row gy-5">
            <?php if (isset($_REQUEST["Err"])) { ?>
                <div class="col-12">
                    <?php
                    if ($_REQUEST["Err"] == "withdrawamout") {
                        ?>
                        <br>
                        <div class="col-md-12 badge rounded-pill bg-success" role="alert"
                             style="padding: 15px; font-size: 16px;">
                            <p><b>SUCCESS!</b> Your Request for Withdraw Amount has been forwarded to Admin.</p>
                        </div>
                        <?php
                    }
                    if ($_REQUEST["Err"] == "alreadywithdrawcom") {
                        ?>
                        <br>
                        <div class="col-md-12 badge rounded-pill bg-danger" role="alert"
                             style="padding: 15px; font-size: 16px;">
                            <p><b>SUCCESS!</b> You already withdraw commission amount! You can withdraw commission
                                amount once in a day.</p>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>

            <div class="col-lg-9">
                <div class="dashborad-header">
                    <h4 class="title">Send your Commission Withdraw Request</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form name="editprofile" method="post" class="account-form">
                            <div class="form-group">
                                <label>Select Withdraw Type</label>
                                <select class="form-control" name="cWithdraw_type" required>
                                    <option value="">Select Withdraw Type</option>
                                    <option value="Jazzcash">Jazzcash</option>
                                    <option value="Easypaisa">Easypaisa</option>
                                </select>
                            </div>
                            <div class="form-group" id="Withdraw_Account">
                                <label>Account No.</label>
                                <input type="number" class="form-control" id="account" maxlength="11" name="caccount"
                                       placeholder="Jazzcash / Easypaisa Account" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Amount for Withdraw</label>
                                <input type="number" min="500" max="<?php if (isset($referral_row["eamount"])) {
                                    $total = $referral_row["eamount"];
                                } else {
                                    $total = 0;
                                }
                                if ($total != "") echo $total; else echo "0"; ?>" class="form-control"
                                       placeholder="Amount for Withdraw" name="cWith_Amount" id="cWith_Amount" value="0"
                                       required>
                            </div>
                            <div class="form-group">
                                <?php if (isset($referral_row["eamount"])) {
                                    if ($referral_row["eamount"] > 500) { ?>
                                        <button type="submit" value="submit" class="btn btn-primary"
                                                name="btnCommissionWithdraw" id="btnCommissionWithdraw">Send Request
                                        </button>
                                    <?php } else { ?>
                                        <button type="button" value="submit" class="btn btn-warning" name="nowithdraw"
                                                id="nowithdraw" disabled>You Cannot Withdraw Amount
                                        </button>
                                        <p align="center" class="text-danger"><b>For Withdraw Commission Amount, Your
                                                Amount should have to be greater than or equal to <big>Rs.
                                                    500</big>.</b></p>
                                    <?php }
                                } else { ?>
                                    <button type="button" value="submit" class="btn btn-warning" name="nowithdraw"
                                            id="nowithdraw" disabled>You Cannot Withdraw Amount
                                    </button>
                                    <p align="center" class="text-danger"><b>For Withdraw Commission Amount, Your Amount
                                            should have to be greater than or equal to <big>Rs. 500</big>.</b></p>
                                    <?php
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!--end container-->

    <!-- Footer Start -->
    <footer class="bg-white shadow py-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <div class="text-sm-start text-center">
                        <p class="mb-0 text-muted">©
                            <script>document.write(new Date().getFullYear())</script>
                            Site
                        </p>
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
                            <li class="d-grid"><a href="../landing/index.html" target="_blank" class="mt-4"><img
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
            <li class="list-inline-item mb-0"><a href="https://1.envato.market/landrick" target="_blank"
                                                 class="rounded"><i class="ti ti-shopping-cart align-middle"
                                                                    title="Buy Now"></i></a></li>
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
<!-- Chart -->
<script src="assets/js/apexcharts.min.js"></script>
<!-- Main Js -->
<script src="assets/js/plugins.init.js"></script>
<script src="assets/js/app.js"></script>

</body>

</html>