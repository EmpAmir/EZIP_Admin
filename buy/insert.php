<?php session_start();
if (!isset($_SESSION["authentication_user"]) || $_SESSION["authentication_user"] !== true) {
    header("location: ../login.php");
    exit;
}

include 'dbConn.php';
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$user_id = $mydata['user_id'];
$usdt_rate = $mydata['usdt_rate'];
$usdt_total = $mydata['usdt_total'];
$inr_total = $mydata['inr_total'];
$id = $mydata['id'];


if (!empty($user_id) && !empty($usdt_rate) && !empty($usdt_total) && !empty($inr_total)) {
    $sql = "INSERT INTO orders(id,user_id,usdt_rate,usdt_total, inr_total) VALUES ('$id','$user_id','$usdt_rate','$usdt_total','$inr_total') ON DUPLICATE KEY UPDATE usdt_rate='$usdt_rate',usdt_total='$usdt_total',inr_total='$inr_total'";
    if ($conn->query($sql) == TRUE) {
        echo "New Order Saved Sucessfully!!";
    } else {
        echo "Unable to Save!!";
    }
} else {
    echo "Fill all Fields!!";
}
