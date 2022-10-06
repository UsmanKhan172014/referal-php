<?php
include("includes/db.php");

if(isset($_REQUEST["Package_Withdraw"])){
    // $query_earn = "SELECT * FROM user_earnings WHERE euserid = '".$_REQUEST["User"]."' AND epackage = '".$_REQUEST["ID"]."' AND etype = 'earning'";
    // $sql_earn = mysqli_query($con,$query_earn);
    // $row_earn = mysqli_fetch_array($sql_earn);
    // echo round($row_earn["eamount"]);

    $total_withdraw1 = 0;
    $query_earn = "SELECT SUM(eamount) AS Total_Earning FROM user_earnings WHERE euserid = '".$_SESSION["User_ID"]."' AND epackage = '".$_REQUEST["ID"]."' AND etype = 'earning'";
    $sql_earn = mysqli_query($con,$query_earn); //echo $up;
    $row_earn = mysqli_fetch_array($sql_earn);

    $query_withdraw1 = "SELECT * FROM withdraw WHERE w_user = '".$_SESSION["User_ID"]."' AND w_package = '".$_REQUEST["ID"]."' AND (w_status = 'Pending' OR w_status = 'Send')";
    $sql_withdraw1 = mysqli_query($con,$query_withdraw1);
    while($row_withdraw1 = mysqli_fetch_array($sql_withdraw1)){
        $total_withdraw1 = $total_withdraw1 + $row_withdraw1["w_amount"];
    }
    $Remaining_Balance = 0;
    $Remaining_Balance = $row_earn["Total_Earning"] - $total_withdraw1;

    echo round($Remaining_Balance);
}

if(isset($_REQUEST["CheckWithdrawRequest"])){
    $query_earn = "SELECT * FROM withdraw WHERE w_package = '".$_REQUEST["ID"]."' AND w_status = 'Pending' AND w_user = '".$_REQUEST["User"]."'";
    $sql_earn = mysqli_query($con,$query_earn);
    $row_earn = mysqli_fetch_array($sql_earn);
    if(mysqli_num_rows($sql_earn) > 0){
        echo "Yes";
    } else {
        echo "No";
    }
}

if(isset($_REQUEST["Package_Withdraw_Limit"])){
    $query_earn = "SELECT * FROM packages WHERE p_id = '".$_REQUEST["ID"]."'";
    $sql_earn = mysqli_query($con,$query_earn);
    $row_earn = mysqli_fetch_array($sql_earn);
    echo round($row_earn["p_earning"]);
    /*$queryPK1 = "SELECT * FROM user_invests UI INNER JOIN packages P ON P.p_id = UI.ipackage WHERE UI.iuserid = '".$_SESSION["User_ID"]."' ";
    $sqlPK1 = mysqli_query($con,$queryPK1);
    $rowPK1 = mysqli_fetch_array($sqlPK1);

    $query_earn = "SELECT SUM(eamount) AS Total_Earning FROM user_earnings WHERE euserid = '".$_SESSION["User_ID"]."' AND epackage = '".$rowPK1["p_id"]."' AND etype = 'earning'";
    $sql_earn = mysqli_query($con,$query_earn); //echo $up;
    $row_earn = mysqli_fetch_array($sql_earn);

    $total_withdraw1 = 0;
    $query_withdraw1 = "SELECT * FROM withdraw WHERE w_user = '".$_SESSION["User_ID"]."' AND w_package = '".$rowPK1["p_id"]."' AND w_status = 'Send'";
    $sql_withdraw1 = mysqli_query($con,$query_withdraw1);
    while($row_withdraw1 = mysqli_fetch_array($sql_withdraw1)){
      $total_withdraw1 = $total_withdraw1 + $row_withdraw1["w_amount"];
    }

    $total_withdraw1 = 0;
    $query_withdraw1 = "SELECT * FROM withdraw WHERE w_user = '".$_SESSION["User_ID"]."' AND w_package = '".$rowPK1["p_id"]."' AND (w_status = 'Pending' OR w_status = 'Send')";
    $sql_withdraw1 = mysqli_query($con,$query_withdraw1);
    while($row_withdraw1 = mysqli_fetch_array($sql_withdraw1)){
      $total_withdraw1 = $total_withdraw1 + $row_withdraw1["w_amount"];
    }
    $Remaining_Balance = 0;
    $Remaining_Balance = $row_earn["Total_Earning"] - $total_withdraw1;
    echo round($Remaining_Balance);*/
}

if(isset($_REQUEST["Refund_Amount"])){
    $query_earn = "SELECT * FROM user_invests WHERE iuserid = '".$_REQUEST["User"]."' AND ipackage = '".$_REQUEST["ID"]."' ";
    $sql_earn = mysqli_query($con,$query_earn);
    $row_earn = mysqli_fetch_array($sql_earn);
    echo round($row_earn["iamount"]);
}

?>