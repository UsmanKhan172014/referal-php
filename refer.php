<?php
include "includes/userheader.php";
?>

<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">


            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="user-dashboard.php">Site1</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Referral</li>
                </ul>
            </nav>
        </div>

        <!--                        <div class="row">-->
        <!--                            <div class="col-12 mt-4">-->
        <!--                                <div class="card border-0 rounded shadow p-4">-->
        <!--                                    <h5 class="mb-0 mb-3">Upgrade/Select Your Package</h5>-->
        <!--                                  <p class="text-muted mb-0">    <span class="text-warning m-4">(Deposit your payments to this bank.)</span></p>-->
        <!--                                    <p class="text-muted mb-0">Bank Name:<span class="text-warning m-5">xyz bank</span></p>-->
        <!--                                    <p class="text-muted mb-0">Bank Account: <span> <input type="number"  class="form-control" style="width: 100px;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> </span></p> -->
        <!--                     <div class="row">-->
        <!--                        <div class="col-md-4">Referral Link:</div>-->
        <!--                        <div class="col-md-8">-->
        <!--                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="-->
        <?php
        //                            $query_ref = "SELECT * FROM signup WHERE user_id = '".$_SESSION["User_ID"]."' ";
        //                            $sql_ref = mysqli_query($con,$query_ref);
        //                            $row_ref = mysqli_fetch_array($sql_ref);
        //                            $num_ref = mysqli_num_rows($sql_ref);
        //
        //                            $rlink = 'https://reliablepey.com/sign-up.php?sender='.$_SESSION["User_AUTOID"].'&referral='.$_SESSION["User_ID"];
        //                            ?><!--">-->
        <!--                            <br><button type="button" class="btn btn-danger">Copy</button>-->
        <!--                        </div>-->
        <!--                     </div>-->
        <!--                            </div>
        <!--                           -->
        <!--                        </div>-->
        <!--                        </div>-->
        <!-- Table Start -->
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="form-row">
                    <b>Referral Link:</b>
                </div>
            </div>
            <div class="col-md-9">
                <?php
                $query_ref = "SELECT * FROM signup WHERE user_id = '" . $_SESSION["User_ID"] . "' ";
                $sql_ref = mysqli_query($con, $query_ref);
                $row_ref = mysqli_fetch_array($sql_ref);
                $num_ref = mysqli_num_rows($sql_ref);

                $rlink = 'https://sunshineworldpk.com/signup.php?sender=' . $_SESSION["User_AUTOID"] . '&referral=' . $_SESSION["User_ID"];
                ?>
                <div id="linksection">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <input type="text" class="col-md-8 form-control" value="<?php echo $rlink; ?>"
                                   id="sharedlink" readonly style="height: 50px;"/>
                            <p class="text-danger text-center">Share this link with others to get Referral Amount.</p>
                        </div>
                        <div class="col-md-3">
                            <!-- onclick="copyLink()" -->
                            <button type="button" class="btn btn-warning" onclick="copyLink()" style="height: 50px;">
                                Copy Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4" id="tables">
            <div class="component-wrapper bg-white rounded shadow">
                <div class="p-4 border-bottom">
                    <h4 class="title mb-0 text-center"> My Referral List </h4>
                </div>

                <div class="p-4">
                    <div class="table-responsive bg-white shadow rounded">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $Sr = 1;
                            $query_ref ="SELECT * FROM signup S WHERE referral_id = '".$_SESSION["User_ID"]."' ";
                            $result_ref = mysqli_query($con, $query_ref);
                            while($row_up = mysqli_fetch_array($result_ref)){
                                ?>
                                <tr>
                                    <td><?=$Sr;?></td>
                                    <td><?php echo $row_up["first_name"];?></td>
                                    <td><?php echo $row_up["user_name"];?></td>
                                    <td><?php echo $row_up["email_address"];?></td>
                                </tr>
                                <?php
                                $Sr++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <!-- Table End -->
        <!-- Table Start -->
        <div class="col-12 mt-4" id="tables">
            <div class="component-wrapper bg-white rounded shadow">
                <div class="p-4 border-bottom">
                    <h4 class="title mb-0 text-center"> Earning From Referrals </h4>
                </div>

                <div class="p-4">
                    <div class="table-responsive bg-white shadow rounded">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Total Amount Received</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $Sr = 1;
                            $query_ref ="SELECT * FROM referral_amounts_record R INNER JOIN signup S ON S.user_id = R.arsender WHERE R.arreceiver = '".$_SESSION["User_ID"]."' ";
                            $result_ref = mysqli_query($con, $query_ref);
                            while($row_up = mysqli_fetch_array($result_ref)){
                                ?>
                                <tr>
                                    <td><?=$Sr;?></td>
                                    <td><?php echo $row_up["first_name"];?></td>
                                    <td><?php echo $row_up["user_name"];?></td>
                                    <td><b>Rs. <?php echo $row_up["aramount"];?></b></td>
                                    <td><?php echo $row_up["email_address"];?></td>
                                </tr>
                                <?php
                                $Sr++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <!-- Table End -->
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

    function copyLink() {
        var copyText = document.getElementById("sharedlink");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        alert("Referral Link Copied.");
    }
</script>
</body>

</html>