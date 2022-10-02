<?php
date_default_timezone_set("Asia/Karachi");
// error_reporting(0);

session_start();
//	$con = mysqli_connect("localhost","futunvlv_reliablepey","customer4626@","futunvlv_reliablepey");
$con = mysqli_connect("localhost","root","","reliablepey");

if(!$con){
    echo "error establishing the connection";
//    header("Location: db_error.php");
}

?>