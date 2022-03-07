<?php 
include 'dbConn.php';
$data = stripslashes(file_get_contents("php://input")) ;
$mydata = json_decode($data,true);
$id = $mydata['sid'];

//editing student 
$sql = "SELECT * FROM sale WHERE id = {$id}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo json_encode($row);
?>