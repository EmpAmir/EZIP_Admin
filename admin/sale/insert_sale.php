<?php 
include 'dbConn.php';
$data = stripslashes(file_get_contents("php://input")) ;
$mydata = json_decode($data,true);
$inr_total = $mydata['inr_total'];
$utr = $mydata['utr'];
$id = $mydata['id'];


if (!empty($inr_total) && !empty($utr)) {
    $sql = "INSERT INTO sale(id,inr_total,utr) VALUES ('$id','$inr_total','$utr') ON DUPLICATE KEY UPDATE inr_total='$inr_total',utr='$utr'";
    if ($conn->query($sql) == TRUE) {
        echo "New Sale Saved Sucessfully!!";
    } else {
        echo "Unable to Save!!";
    }  
} else {
    echo "Fill all Fields!!";
}

?>