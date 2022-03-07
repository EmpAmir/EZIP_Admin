<?php 
include 'dbConn.php';
$data = stripslashes(file_get_contents("php://input")) ;
$mydata = json_decode($data,true);
$usdt_rate = $mydata['usdt_rate'];
$usdt_total = $mydata['usdt_total'];
$inr_total = $mydata['inr_total'];
$id = $mydata['id'];


if (!empty($usdt_rate) && !empty($usdt_total) && !empty($inr_total)) {
    $sql = "INSERT INTO orders(id,usdt_rate,usdt_total, inr_total) VALUES ('$id','$usdt_rate','$usdt_total','$inr_total') ON DUPLICATE KEY UPDATE usdt_rate='$usdt_rate',usdt_total='$usdt_total',inr_total='$inr_total'";
    if ($conn->query($sql) == TRUE) {
        echo "New Order Saved Sucessfully!!";
    } else {
        echo "Unable to Save!!";
    }  
} else {
    echo "Fill all Fields!!";
}

?>