<?php
include("db.php");

if(!isset($_SESSION['User_ID'])){
    echo "<script>window.location='login.php'</script>";
}

$sql = "SELECT * FROM signup WHERE user_id = '".$_SESSION["User_ID"]."' ";
$result = mysqli_query($con, $sql);
$userrow = mysqli_fetch_array($result);

$query = "SELECT *,SUM(aamount) as total_user_amount FROM user_amounts WHERE auserid = '".$_SESSION["User_ID"]."' AND astatus = 'Approved' ORDER BY aid DESC LIMIT 1";
$sql = mysqli_query($con,$query); //echo $up;
$balance_row = mysqli_fetch_array($sql);
$balance_num = mysqli_num_rows($sql);

$Total_Earning = 0;
$query = "SELECT SUM(eamount) AS Total_Earning FROM user_earnings WHERE euserid = '".$_SESSION["User_ID"]."' AND etype = 'earning' ";
$sql = mysqli_query($con,$query); //echo $up;
$eanring_num = mysqli_num_rows($sql);
$eanring_row = mysqli_fetch_array($sql);
$Total_Earning = $Total_Earning + $eanring_row["Total_Earning"];

$Withdarw_Earning = 0;
$query = "SELECT SUM(w_amount) AS Withdarw_Earning FROM withdraw WHERE w_user = '".$_SESSION["User_ID"]."' AND (w_status = 'Pending' OR w_status = 'Send') AND w_type = 'Earning'";
$sql = mysqli_query($con,$query); //echo $up;
$withdraw_num = mysqli_num_rows($sql);
$withdraw_row = mysqli_fetch_array($sql);
$Withdarw_Earning = $Withdarw_Earning + $withdraw_row["Withdarw_Earning"];
// echo $query;
$Remaining_Balance = 0;
$Remaining_Balance = $Total_Earning - $Withdarw_Earning;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Site1 Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Admin Dashboard Template" />
    <meta name="keywords" content="Saas, CRM, Admin, Dashboard, Modern, Classic" />
    <meta name="author" content="Shreethemes" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="website" content="https://shreethemes.in" />
    <meta name="Version" content="v4.0.0" />
    <!-- favicon -->
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- simplebar -->
    <link href="assets/css/simplebar.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <!-- Icons -->
    <link href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/tabler-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="https://unicons.iconscout.com/release/v3.0.6/css/line.css"  rel="stylesheet">
    <!-- Css -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />

</head>

<body>

<div class="page-wrapper landrick-theme toggled">
    <?php

    include "includes/usersidebar.php";
    ?>
    <!-- sidebar-wrapper  -->

    <!-- Start Page Content -->
    <main class="page-content bg-light">
        <div class="top-header">
            <div class="header-bar d-flex justify-content-between border-bottom">
                <div class="d-flex align-items-center">
                    <a href="#" class="logo-icon me-3">
                        <img src="assets/images/logo-icon.png" height="30" class="small" alt="">
                        <span class="big">
                                    <img src="assets/images/logo-dark.png" height="24" class="logo-light-mode" alt="">
                                    <img src="assets/images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                                </span>
                    </a>
                    <i class="ti ti-menu-2"></i>
                    </a>
                    <div class="search-bar p-0 d-none d-md-block ms-2">
                        <div id="search" class="menu-search mb-0">
                            <form role="search" method="get" id="searchform" class="searchform">
                                <div>
                                    <input type="text" class="form-control border rounded" name="s" id="s" placeholder="Search Keywords...">
                                    <input type="submit" id="searchsubmit" value="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <ul class="list-unstyled mb-0">
                    <li class="list-inline-item mb-0">
                        <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        </a>
                    </li>

                    <li class="list-inline-item mb-0 ms-1">
                        <div class="dropdown dropdown-primary">
                            <button type="button" class="btn btn-icon btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti ti-bell"></i></button>
                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>

                            <div class="dropdown-menu dd-menu bg-white shadow rounded border-0 mt-3 p-0" data-simplebar style="height: 320px; width: 290px;">
                                <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                                    <h6 class="mb-0 text-dark">Notifications</h6>
                                    <span class="badge bg-soft-danger rounded-pill">3</span>
                                </div>
                                <div class="p-3">
                                    <a href="#!" class="dropdown-item features feature-primary key-feature p-0">
                                        <div class="d-flex align-items-center">
                                            <div class="icon text-center rounded-circle me-2">
                                                <i class="ti ti-shopping-cart"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-dark title">Order Complete</h6>
                                                <small class="text-muted">15 min ago</small>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/client/04.jpg" class="avatar avatar-md-sm rounded-circle border shadow me-2" alt="">
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-dark title"><span class="fw-bold">Message</span> from Luis</h6>
                                                <small class="text-muted">1 hour ago</small>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon text-center rounded-circle me-2">
                                                <i class="ti ti-currency-dollar"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-dark title"><span class="fw-bold">One Refund Request</span></h6>
                                                <small class="text-muted">2 hour ago</small>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon text-center rounded-circle me-2">
                                                <i class="ti ti-truck-delivery"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-dark title">Deliverd your Order</h6>
                                                <small class="text-muted">Yesterday</small>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="#!" class="dropdown-item features feature-primary key-feature p-0 mt-3">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/client/15.jpg" class="avatar avatar-md-sm rounded-circle border shadow me-2" alt="">
                                            <div class="flex-1">
                                                <h6 class="mb-0 text-dark title"><span class="fw-bold">Cally</span> started following you</h6>
                                                <small class="text-muted">2 days ago</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-inline-item mb-0 ms-1">
                        <div class="dropdown dropdown-primary">
                            <button type="button" class="btn btn-soft-light dropdown-toggle p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/client/05.jpg" class="avatar avatar-ex-small rounded" alt=""></button>
                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow border-0 mt-3 py-3" style="min-width: 200px;">
                                <a class="dropdown-item d-flex align-items-center text-dark pb-3" href="profile.html">
                                    <img src="assets/images/client/05.jpg" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                                    <div class="flex-1 ms-2">
                                        <span class="d-block"><?php echo $_SESSION["User_FULLNAME"]; ?></span>

                                    </div>
                                </a>
                                <a class="dropdown-item text-dark" href="user-dashboard.php"><span class="mb-0 d-inline-block me-1"><i class="ti ti-home"></i></span> Dashboard</a>
                                <a class="dropdown-item text-dark" href="profile-edit.php"><span class="mb-0 d-inline-block me-1"><i class="ti ti-settings"></i></span>Edit Profile</a>
                                <div class="dropdown-divider border-top"></div>
                                <a class="dropdown-item text-dark" href="logout.php"><span class="mb-0 d-inline-block me-1"><i class="ti ti-logout"></i></span> Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>