<?php
session_start();
if (!isset($_SESSION["authentication_user"]) || $_SESSION["authentication_user"] !== true) {
    header("location: ../login.php");
    exit;
}
include 'dbConn.php';
$user_id = $_SESSION['auth_user']['user_id'];
$sql = "SELECT * FROM sale where user_id ='$user_id';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
