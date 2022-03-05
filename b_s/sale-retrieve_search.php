<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
session_start();
if (!isset($_SESSION["authentication_user"]) || $_SESSION["authentication_user"] !== true) {
	header("location: ../login.php");
	exit;
}

/*$data = json_decode(file_get_contents("php://input"), true);
$search_value = $data['search'];*/


if ($search_value = isset($_GET['search']) ? $_GET['search'] : die()) {
	include "dbConn.php";
	$user_id = $_SESSION['auth_user']['user_id'];
	$sql = "SELECT * FROM sale WHERE user_id ='$user_id' AND inr_total LIKE '%{$search_value}%' or user_id ='$user_id' AND utr LIKE '%{$search_value}%';";
	$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

	if (mysqli_num_rows($result) > 0) {

		$output = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($output);
	} else {

		echo json_encode(array('message' => 'No Search Found.', 'status' => false));
	}
} else {
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
}
