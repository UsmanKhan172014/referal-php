<?php
include("includes/db.php");

$sql = "SELECT * FROM signup WHERE user_id = '".$_SESSION["User_ID"]."' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if(isset($_POST['btnSubmit']))
{
    $first_name = $_POST['first_name'];
    $email_adress = $_POST['Email'];
    $mobile_no = $_POST['mobile_no'];
    $old_password = $_POST['Password'];
    $user_password = $row['password'];
    $retype_password = $_POST['retype_password'];
    $confirm_retype_password = $_POST['confirm_retype_password'];

    if($old_password == $user_password){
        if($retype_password == $confirm_retype_password){
            $query = "UPDATE signup SET 
                           first_name = '".$first_name."',
                           email_address = '".$email_adress."',
                           mobile_no = '".$mobile_no."',
                           password = '".$retype_password."'
                            WHERE user_id = '".$_SESSION["User_ID"]."' ";
            mysqli_query($con,$query);
            echo "<script>window.location='profile-edit.php?Err=psuccess'</script>";
        } else {
            echo "<script>window.location='profile-edit.php?Err=pcfailed'</script>";
        }
    }
    else{
        echo "<script>window.location='edit_profile.php?Err=pfailed'</script>";
    }


}
include "includes/userheader.php"
?>

                <div class="container-fluid">
                    <div class="layout-specing">
                        <div class="card border-0 rounded shadow p-4">
                            <h5 class="mb-0 text-center">Edit Profile</h5>

                                <div class="row mt-4">
                                    <?php if(isset($_REQUEST["Err"])){ ?>
                                        <div class="col-12">
                                            <?php
                                            if($_REQUEST["Err"] == "psuccess")
                                            {
                                                ?>
                                                <br>
                                                <div class="alert alert-success" role="alert">
                                                    <p><b>SUCCESS!</b> Profile updated successfully.</p>
                                                </div>
                                                <?php
                                            }
                                            if($_REQUEST["Err"] == "pfailed")
                                            {
                                                ?>
                                                <br>
                                                <div class="alert alert-danger" role="alert">
                                                    <p><b>Error!</b> Old Password is not correct.</p>
                                                </div>
                                                <?php
                                            }
                                            if($_REQUEST["Err"] == "pcfailed")
                                            {
                                                ?>
                                                <br>
                                                <div class="alert alert-danger" role="alert">
                                                    <p><b>Error!</b> New Password and Confirm Password does not match.</p>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                <form name="editprofile" method="POST" class="account-form">
                                    <label>Full Name</label>
                                    <div class="form--group">
                                        <i class="las la-user"></i>
                                        <input type="text" class="form-control" placeholder="Userame" name="first_name" value="<?=$row["first_name"];?>">
                                    </div>
                                    <label>Username</label>
                                    <div class="form--group">
                                        <i class="las la-user"></i>
                                        <input type="text" pattern="[^' ']+" class="form-control" placeholder="Userame" name="user_name" value="<?=$row["user_name"];?>" oninvalid="this.setCustomValidity('Enter Username Here without Spaces')" oninput="this.setCustomValidity('')" readonly>
                                    </div>
                                    <label>Email</label>
                                    <div class="form--group">
                                        <i class="las la-user"></i>
                                        <input type="text" class="form-control" placeholder="Email" value="<?=$row["email_address"];?>" name="Email">
                                    </div>
                                    <label>Mobile Number</label>
                                    <div class="form--group">
                                        <i class="las la-phone"></i>
                                        <input type="text" name="mobile_no" value="<?=$row["mobile_no"];?>" class="form-control" placeholder="Phone Number" required="">
                                    </div>
                                    <label>Reference Username</label>
                                    <div class="form--group">
                                        <i class="las la-user"></i>
                                        <input type="text" pattern="[^' ']+" class="form-control" placeholder="Userame" name="user_name" value="<?=$row["referrence_username"];?>" oninvalid="this.setCustomValidity('Enter Username Here without Spaces')" oninput="this.setCustomValidity('')" readonly>
                                    </div>
                                    <label>Old Password</label>
                                    <div class="form--group">
                                        <i class="las la-lock"></i>
                                        <input type="password" name="Password" class="form-control" placeholder="Old Password" required="">
                                    </div>
                                    <label>New Password</label>
                                    <div class="form--group">
                                        <i class="las la-lock"></i>
                                        <input type="password" name="retype_password" class="form-control" placeholder="New Password" required="">
                                    </div>
                                    <label>Confirm New Password</label>
                                    <div class="form--group">
                                        <i class="las la-lock"></i>
                                        <input type="password" name="confirm_retype_password" class="form-control" placeholder="Confirm New Password" required="">
                                    </div>
                                    <div class="form--group">
                                        <button class="btn btn-primary mt-2" name="btnSubmit">UPDATE PROFILE</button>
                                    </div>
                                </form>
                </div><!--end container-->

                <!-- Footer Start -->
                <footer class="bg-white shadow py-3">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-sm-start text-center">
                                    <p class="mb-0 text-muted">© <script>document.write(new Date().getFullYear())</script>Site </p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </footer><!--end footer-->
                <!-- End -->
            </main>
            <!--End page-content" -->
        </div>
                    </div>
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
                                    <li class="d-grid"><a href="../landing/index.html" target="_blank" class="mt-4"><img src="assets/images/demos/landing.png" class="img-fluid rounded-md shadow-md d-block" alt=""><span class="text-muted mt-2 d-block">Landing Demos</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end Style switcher -->
                    </div><!--end col-->
                </div>
            </div>

            <div class="offcanvas-footer p-3 border-top text-center">
                <ul class="list-unstyled social-icon mb-0">
                    <li class="list-inline-item mb-0"><a href="https://1.envato.market/landrick" target="_blank" class="rounded"><i class="ti ti-shopping-cart align-middle" title="Buy Now"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://dribbble.com/shreethemes" target="_blank" class="rounded"><i class="ti ti-brand-dribbble align-middle" title="dribbble"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.facebook.com/shreethemes" target="_blank" class="rounded"><i class="ti ti-brand-facebook align-middle" title="facebook"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded"><i class="ti ti-brand-instagram align-middle" title="instagram"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded"><i class="ti ti-brand-twitter align-middle" title="twitter"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="mailto:support@shreethemes.in" class="rounded"><i class="ti ti-mail align-middle" title="email"></i></a></li>
                    <li class="list-inline-item mb-0"><a href="https://shreethemes.in" target="_blank" class="rounded"><i class="ti ti-world align-middle" title="website"></i></a></li>
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