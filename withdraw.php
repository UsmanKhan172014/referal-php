<?php
include("includes/db.php");

$Total_Earning = 0;

$query = "SELECT SUM(eamount) AS Total_Earning FROM user_earnings WHERE euserid = '".$_SESSION["User_ID"]."' AND etype = 'earning' ";
$sql = mysqli_query($con,$query); //echo $up;
$eanring_num = mysqli_num_rows($sql);
$eanring_row = mysqli_fetch_array($sql);
$Total_Earning = $Total_Earning + $eanring_row["Total_Earning"];

if(isset($_POST['btnEarningWithdraw']))
{
    $queryWC = "SELECT * FROM withdraw WHERE w_user = '".$_SESSION["User_ID"]."' AND w_package = '".$_REQUEST["Withdraw_Package"]."' AND w_date = '".date("Y-m-d")."' ";
    $sqlWC = mysqli_query($con,$queryWC);
    if(mysqli_num_rows($sqlWC) > 0){
        echo "<script>window.location='withdraw-page.php?Err=alreadywithdraw'</script>";
    }
    else{
        $query3 = "SELECT * FROM packages WHERE p_id = '".$_REQUEST["Withdraw_Package"]."' ";
        $sql3 = mysqli_query($con,$query3);
        $row3 = mysqli_fetch_array($sql3);

        $query = "SELECT * FROM user_invests UI INNER JOIN packages P ON UI.ipackage = P.p_id WHERE UI.iuserid = '".$_SESSION["User_ID"]."' AND UI.ipackage = '".$_REQUEST["Withdraw_Package"]."' ";
        $sql = mysqli_query($con,$query);
        $row2 = mysqli_fetch_array($sql);
        if($row2["iamount"] < $row3["p_invest"]){
            echo "<script>window.location='withdraw-page.php?Err=withdrawmin&mininvest=".$row3["p_invest"]."'</script>";
        }
        else{
            $query = "SELECT SUM(eamount) AS Total_Earning FROM user_earnings WHERE euserid = '".$_SESSION["User_ID"]."' AND epackage = '".$_REQUEST["Withdraw_Package"]."' AND etype = 'earning'";
            $sql = mysqli_query($con,$query); //echo $up;
            $eanring_row = mysqli_fetch_array($sql);
            $eanring_num = mysqli_num_rows($sql);

            if($_REQUEST["eWith_Amount"] > $eanring_row["Total_Earning"] || $eanring_row["Total_Earning"] <= 0){
                echo "<script>window.location='withdraw-page.php?Err=withdrawerr'</script>";
            }
            else{

                $iquery = "INSERT INTO `withdraw`(w_type, w_user, w_amounttype, w_bank, w_iban, w_account,w_package, w_amount, w_date, w_status) 
                                VALUES ('Earning','".$_SESSION["User_ID"]."','".$_REQUEST["eWithdraw_type"]."','".$_REQUEST["eWithdraw_bank"]."','".$_REQUEST["eIBAN"]."','".$_REQUEST["eaccount"]."','".$_REQUEST["Withdraw_Package"]."','".$_REQUEST["eWith_Amount"]."','".Date("Y-m-d")."','Pending')";

                mysqli_query($con,$iquery);
                echo "<script>window.location='withdraw.php?Err=withdrawamout'</script>";
            }
        }
    }
}

if(isset($_POST['btnEarningWithdraw2']))
{

    $iquery = "INSERT INTO `withdraw`(w_type, w_user, w_amounttype, w_bank, w_iban, w_account,w_package, w_amount, w_date, w_status) 
                    VALUES ('Earning','".$_SESSION["User_ID"]."','".$_REQUEST["eWithdraw_type"]."','".$_REQUEST["eWithdraw_bank"]."','".$_REQUEST["eIBAN"]."','".$_REQUEST["eaccount"]."','".$_REQUEST["Withdraw_Package"]."','".$_REQUEST["eWith_Amount"]."','".Date("Y-m-d")."','Pending')";

    mysqli_query($con,$iquery);
    echo "<script>window.location='user-dashboard.php?Err=withdrawamout'</script>";


}
include "includes/userheader.php"
?>
                <div class="row justify-content-center mt-4">
                    <?php

                    $query = "SELECT * FROM packages";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_array($sql)){

                        ?>
                        <div class="col-lg-3 col-md-4 col-12 mt-4 pt-2">
                            <div class="card pricing pricing-primary business-rate shadow bg-light border-0 rounded">
                                <div class="card-body">
                                    <h6 class="title name fw-bold text-uppercase mb-4"><?=$row["p_name"]?></h6>
                                    <div class="d-flex mb-4">
                                        <span class="h4 mb-0 mt-2">Rs.</span>
                                        <span class="price h1 mb-0"><?=$row["p_invest"]?></span>
                                    </div>

                                    <ul class="list-unstyled mb-0 ps-0">
                                        <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Duration <?=$row["p_duration"]?></li>
                                        <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Daily Auto Profit Rs.<?=$row["p_earning"]?></li>
                                        <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Min/Max Unlimited Rs.<?=$row["p_earning"]?></li>
                                        <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Refer Commission Rs.<?=$row["p_reffered_commision"]?></li>
                                        <li class="h6 text-muted mb-0"><span class="icon h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Total Profit Rs.<?=$row["p_total_profit"]?></li>
                                    </ul>
                                    <a href="javascript:void(0)" class="btn mt-4">Buy Now</a>
                                </div>
                            </div>
                        </div><!--end col-->
                        <?php

                    }
                    ?>
                </div>
                <div class="col-12 mt-4" id="select-box">
                    <div class="component-wrapper bg-white rounded shadow">
                        <div class="p-4 border-bottom">
                            <h4 class="title mb-0 text-center">
                                Send your Commission Withdraw Request </h4>
                        </div>

<!--                        <div class="p-4">-->
<!--                            <div class="mb-0">-->
<!--                                <select class="form-select form-control" aria-label="Default select example">-->
<!--                                    <option selected>Select your Package</option>-->
<!--                                    --><?php
//                                    if($_SESSION["User_TYPE"] == "Normal") {
//                                        $queryPK1 = "SELECT DISTINCT(epackage) as userpackage FROM user_earnings WHERE euserid = '".$_SESSION["User_ID"]."' ";
//                                        $sqlPK1 = mysqli_query($con,$queryPK1);
//                                        while($rowPK1 = mysqli_fetch_array($sqlPK1)){
//
//                                            $queryP = "SELECT * FROM packages WHERE p_id = '".$rowPK1["userpackage"]."' ";
//                                            $resP = mysqli_query($con,$queryP);
//                                            $rowP = mysqli_fetch_array($resP);
//                                            ?>
<!--                                            <option value="--><?//=$rowP["p_id"]?><!--">--><?//=$rowP["p_name"]?><!--</option>-->
<!--                                            --><?php
//                                        }
//                                    } else {
//                                        ?>
<!--                                        <option value="0">Special User Package</option>-->
<!--                                        --><?php
//                                    }
//                                    ?>
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="p-4">-->
<!--                            <div class="mb-0">-->
<!--                                <select class="form--control" onchange="Withdraw_type(this.value)" name="eWithdraw_type" required>-->
<!--                                    <option value="">Select Withdraw Type</option>-->
<!--                                    <option value="Bank">Bank</option>-->
<!--                                    <option value="Jazzcash">Jazzcash</option>-->
<!--                                    <option value="Easypaisa">Easypaisa</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!--                        <div class="p-4">-->
<!--                            <div class="mb-0">-->
<!---->
<!--                                <input type="number" class="form-control" id="email" placeholder="0 ">-->
<!---->
<!--                            </div><br>-->
<!--                            <button type="button" class="btn btn-danger">Send Request</button>-->
<!--                        </div>-->
                         <form name="editprofile" method="post" class="account-form">
                                <div class="form-group">
                                    <label>Select Your Package</label>
                                    <select class="form-control" onchange="withdrawPackage(<?=$_SESSION["User_ID"]?>,this.value)" name="Withdraw_Package" required>
                                        <option value="">Select Your Package</option>
                              <?php
                                if($_SESSION["User_TYPE"] == "Normal") {
                                    $queryPK1 = "SELECT DISTINCT(epackage) as userpackage FROM user_earnings WHERE euserid = '".$_SESSION["User_ID"]."' ";
                                    $sqlPK1 = mysqli_query($con,$queryPK1);
                                    while($rowPK1 = mysqli_fetch_array($sqlPK1)){

                                      $queryP = "SELECT * FROM packages WHERE p_id = '".$rowPK1["userpackage"]."' ";
                                      $resP = mysqli_query($con,$queryP);
                                      $rowP = mysqli_fetch_array($resP);
                              ?>
                                        <option value="<?=$rowP["p_id"]?>"><?=$rowP["p_name"]?></option>
                              <?php
                                    }
                                } else {
                              ?>
                                        <option value="0">Special User Package</option>
                              <?php
                                }
                              ?>
                                    </select>
                                </div>
                                <br><br>
                                <div class="form-group">
                                    <label>Select Withdraw Type</label>
                                    <select class="form-control" onchange="Withdraw_type(this.value)" name="eWithdraw_type" required>
                                        <option value="">Select Withdraw Type</option>
                                        <option value="Bank">Bank</option>
                                        <option value="Jazzcash">Jazzcash</option>
                                        <option value="Easypaisa">Easypaisa</option>
                                    </select>
                                </div>
                                <br><br>
                                <div class="form--group" id="bank_name" style="display: none;">
                                    <label>Select Bank</label>
                                    <select class="form-control" name="eWithdraw_bank" id="eWithdraw_bank" required>
                                        <option value="">Select Bank</option>
              <?php
                  $query_bank = "SELECT * FROM banks";
                $sql_bank = mysqli_query($con,$query_bank);
                while($row_bank = mysqli_fetch_array($sql_bank)){
              ?>
                  <option value="<?=$row_bank["bank_id"]?>" ><?=$row_bank["bank_name"]?></option>
              <?php
                  }
              ?>
                                    </select>
                                </div>
                                <div class="form--group" id="bank_IBAN" style="display: none;">
                                    <label>IBAN No.</label>
                                    <input type="text" class="form-control" id="IBAN" name="eIBAN" placeholder="IBAN No." autocomplete="off" >
                                </div>
                                <div class="form--group" id="Withdraw_Account" style="display: none;">
                                    <label>Account No.</label>
                                    <input type="number" class="form-control" id="account" maxlength="11" name="eaccount" placeholder="Jazzcash / Easypaisa Account" autocomplete="off">
                                </div>
                                <div class="form--group">
                                    <label>Amount for Withdraw</label>
                            <?php if($_SESSION["User_TYPE"] == "Normal") { ?>
                                    <span style="font-size: 12px;">(Minimum Withdraw Limit <big><b id="Withdraw_Limit"></b></big>) and (Your Available Earning <big><b id="Pack_Earn"></b></big>)</span>
                                    <input type="number" min="0" max="0" class="form-control" placeholder="Amount for Withdraw" name="eWith_Amount" id="eWith_Amount" value="0" required>
                            <?php } else { ?>
                                    <input type="number" name="eWith_Amount" min="0" max="" value="<?php echo $Remaining_Balance; ?>" readonly id="eWith_Amount" required class="form-control" placeholder="Amount for Withdraw"/>
                            <?php } ?>
                                </div>
                                <div class="form--group">
    <?php
       if($_SESSION["User_TYPE"] == "Normal") {
           $ewithdraw_condition = $Total_Earning * 0.25;
           if($Total_Earning > 0) {
    ?>
            <button type="submit" value="submit" class="btn btn-primary" name="btnEarningWithdraw" id="btnEarningWithdraw">Send Request</button></div>
    <?php
           } else {
    ?>
            <button type="button" value="submit" class="btn btn-warning" name="nowithdraw" id="nowithdraw" disabled>You Cannot Withdraw Amount</button></div>
    <?php   if($ewithdraw_condition != 0) { ?>
                <p align="center" class="text-danger"><b>For Withdraw Earning Amount, Your Amount should have to be greater than or equal to <big>Rs. <?=$ewithdraw_condition?></big>.</b></p>
    <?php   } else { ?>
            <p align="center" class="text-danger"><b>You can't Withdraw Amount, You do not have any Earnings.</b></p>
    <?php
            }
          }
       } else {
           if($Remaining_Balance == "" || $Remaining_Balance == 0){
    ?>
            <button type="button" value="submit" class="btn btn-warning" name="nowithdraw" id="nowithdraw" disabled>You Cannot Withdraw Amount</button></div>
    <?php
           } else {
    ?>
            <button type="submit"  value="submit" class="btn btn-primary" name="btnEarningWithdraw2" id="btnEarningWithdraw2">Send Request</button></div>
    <?php
           }
       }
    ?>
                                </div>
                            </form>
                    </div>


                   
                    <!-- Table Start -->
                    <div class="col-12 mt-4" id="tables">
                        <div class="component-wrapper bg-white rounded shadow">
                            <div class="p-4 border-bottom">
                                <h4 class="title mb-0 text-center"> Transaction Log </h4>
                            </div>

                            <div class="p-4">
                                <div class="table-responsive bg-white shadow rounded">
                                    <table class="table table-bordered">
                                            <thead>
                                              <th>Sr. No.</th>
                                              <th>Package Name</th>
                                              <th>Earning Type</th>
                                              <th>Account Type</th>
                                              <th>Account No</th>
                                              <th>Amount</th>
                                              <th>Date</th>
                                              <th>Status</th>
                                            </thead>
                                            <tbody>
                                              <?php
                                                $Sr = 1;
                                                $query = "SELECT * FROM withdraw W LEFT JOIN packages P ON P.p_id = W.w_package WHERE W.w_user = '".$_SESSION["User_ID"]."' AND (W.w_status = 'Pending' OR W.w_status = 'Send')";
                                                $sql = mysqli_query($con,$query); //echo $query;
                                                $withdraw_num = mysqli_num_rows($sql);
                                                while($withdraw_row = mysqli_fetch_array($sql)){

                                                    $bankname = "";
                                                    if($withdraw_row["w_amounttype"] == "Bank") {
                                                        $bquery = "SELECT * FROM banks WHERE bank_id = '".$withdraw_row["w_bank"]."' ";
                                                        $bsql = mysqli_query($con,$bquery)or die(mysqli_error($con));
                                                        $brow = mysqli_fetch_array($bsql);
                                                        $bankname = $brow["bank_name"];
                                                    }
                                              ?>
                                              <tr>
                                                <td><?=$Sr;?></td>
                                                <td><?php if($withdraw_row["p_name"] == ""){ echo "------"; } else { echo $withdraw_row["p_name"]; } ?></td>
                                                <td><?=$withdraw_row["w_type"]?></td>
                                                <td><?=$withdraw_row["w_amounttype"]?></td>
                                                <td><?php if($withdraw_row["w_amounttype"] == "Bank") { echo $withdraw_row["w_iban"]." <br>(<b>".$withdraw_row["w_amounttype"]."</b>: ".$bankname.")"; } else { echo $withdraw_row["w_account"]." (".$withdraw_row["w_amounttype"].")"; } ?></td>
                                                <td>PKR <?=number_format($withdraw_row["w_amount"])?></td>
                                                <td><?=date("d-m-Y",strtotime($withdraw_row["w_date"]));?></td>
                                                <td><?=$withdraw_row["w_status"]?></td>
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
                <!-- Footer Start -->
                <footer class="bg-white shadow py-3">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-sm-start text-center">
                                    <p class="mb-0 text-muted">© <script>document.write(new Date().getFullYear())</script> Site1</p>
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
        <div class="offcanvas offcanvas-end bg-white shadow" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header border-bottom">
                <h5 id="offcanvasRightLabel" class="mb-0">
                    <img src="assets/images/logo-dark.png" height="24" class="light-version" alt="">
                    <img src="assets/images/logo-light.png" height="24" class="dark-version" alt="">
                </h5>
                <button type="button" class="btn-close d-flex align-items-center text-dark" data-bs-dismiss="offcanvas" aria-label="Close"><i class="mdi mdi-close fs-4"></i></button>
            </div>
            <div class="offcanvas-body p-4 px-md-5">
                <div class="row">
                    <div class="col-12">
                        <!-- Style switcher -->
                        <div id="style-switcher">
                            <div>
                                <ul class="text-center list-unstyled mb-0">
                                    <li class="d-grid"><a href="javascript:void(0)" class="rtl-version t-rtl-light" onclick="setTheme('style-rtl')"><img src="assets/images/demos/rtl.png" class="img-fluid rounded-md shadow-md d-block" alt=""><span class="text-muted mt-2 d-block">RTL Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="ltr-version t-ltr-light" onclick="setTheme('style')"><img src="assets/images/demos/ltr.png" class="img-fluid rounded-md shadow-md d-block" alt=""><span class="text-muted mt-2 d-block">LTR Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="dark-rtl-version t-rtl-dark" onclick="setTheme('style-dark-rtl')"><img src="assets/images/demos/dark-rtl.png" class="img-fluid rounded-md shadow-md d-block" alt=""><span class="text-muted mt-2 d-block">RTL Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="dark-ltr-version t-ltr-dark" onclick="setTheme('style-dark')"><img src="assets/images/demos/dark.png" class="img-fluid rounded-md shadow-md d-block" alt=""><span class="text-muted mt-2 d-block">LTR Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="dark-version t-dark mt-4" onclick="setTheme('style-dark')"><img src="assets/images/demos/dark.png" class="img-fluid rounded-md shadow-md d-block" alt=""><span class="text-muted mt-2 d-block">Dark Version</span></a></li>
                                    <li class="d-grid"><a href="javascript:void(0)" class="light-version t-light mt-4" onclick="setTheme('style')"><img src="assets/images/demos/ltr.png" class="img-fluid rounded-md shadow-md d-block" alt=""><span class="text-muted mt-2 d-block">Light Version</span></a></li>
                                    <li class="d-grid"><a href="../landing/index.php" target="_blank" class="mt-4"><img src="assets/images/demos/landing.png" class="img-fluid rounded-md shadow-md d-block" alt=""><span class="text-muted mt-2 d-block">Landing Demos</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end Style switcher -->
                    </div><!--end col-->
                </div>
            </div>

            <div class="offcanvas-footer p-3 border-top text-center">
                <ul class="list-unstyled social-icon mb-0">
                    <li class="list-inline-item mb-0"><a href="" target="_blank" class="rounded"><i class="ti ti-shopping-cart align-middle" title="Buy Now"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="" target="_blank" class="rounded"><i class="ti ti-brand-dribbble align-middle" title="dribbble"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="" target="_blank" class="rounded"><i class="ti ti-brand-facebook align-middle" title="facebook"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="" target="_blank" class="rounded"><i class="ti ti-brand-instagram align-middle" title="instagram"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="" target="_blank" class="rounded"><i class="ti ti-brand-twitter align-middle" title="twitter"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="" class="rounded"><i class="ti ti-mail align-middle" title="email"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="" target="_blank" class="rounded"><i class="ti ti-world align-middle" title="website"></i></a></li>
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

    function Withdraw_type(val){
        if (val == "Bank") {
            $("#bank_name").show();
            $("#bank_IBAN").show();
            $("#Withdraw_Account").hide();

            $("#eWithdraw_bank").attr("required", true);
            $("#IBAN").attr("required", true);
            $("#account").attr("required", false);
        }
        else{
            $("#bank_name").hide();
            $("#bank_IBAN").hide();
            $("#Withdraw_Account").show();

            document.getElementById("account").placeholder = val+" Account No.";

            $("#eWithdraw_bank").attr("required", false);
            $("#IBAN").attr("required", false);
            $("#account").attr("required", true);
        }
    }

    function withdrawPackage(user,id){
        // alert(user+" = "+id);
        var min_amount = 0;
        $.ajax({
            type: 'post',
            data: { "id":id,"user":user },
            url: 'ajax_work.php?Package_Withdraw_Limit&ID='+id,
            dataType: 'html',
            cache: false,
            success: function(data){
                min_amount = parseInt(data);
                var amount = "RS. "+data;
                $("#eWith_Amount").attr({"min" : data});
                $("#Withdraw_Limit").html(amount);
            }
        });

        var max_amount = 0;
        $.ajax({
            type: 'post',
            data: { "id":id,"user":user },
            url: 'ajax_work.php?Package_Withdraw&ID='+id+'&User='+user,
            dataType: 'html',
            cache: false,
            success: function(data){
                // alert(data);
                max_amount = parseInt(data);
                var amount = "RS. "+data;
                if(min_amount <= max_amount){
                    $("#eWith_Amount").attr({"max" : data});
                }
                $("#Pack_Earn").html(amount);
            }
        });
        var max_amount = 0;
        $.ajax({
            type: 'post',
            data: { "id":id,"user":user },
            url: 'ajax_work.php?CheckWithdrawRequest&ID='+id+'&User='+user,
            dataType: 'html',
            cache: false,
            success: function(data){
                // alert(data);
                if(data == "Yes"){
                    $("#btnEarningWithdraw").attr("disabled", true);
                    $("#btnEarningWithdraw").text("You cannot withdraw, your request is already in pending.");
                } else {
                    $("#btnEarningWithdraw").attr("disabled", false);
                    $("#btnEarningWithdraw").text("Send Request");
                }
            }
        });

    }
</script>
        
    </body>

</html>