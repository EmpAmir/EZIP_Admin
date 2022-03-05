<?php
include 'dbConn.php';
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$username = $mydata['username'];
$user_id = $mydata['user_id'];
$password = $mydata['password'];
$mobile = $mydata['mobile'];
$id = $mydata['id'];


if (!empty($username) && !empty($user_id) && !empty($password) && !empty($mobile)) {
    $sql = "INSERT INTO users(id,username,user_id,userPass,mobile) VALUES ('$id','$username','$user_id','$password','$mobile') ON DUPLICATE KEY UPDATE username='$username',user_id='$user_id',userPass='$password',mobile='$mobile'";
    if ($conn->query($sql) == TRUE) {
        echo "New Users Saved Sucessfully!!";
    } else {
        echo "Unable to Save!!";
    }
} else {
    echo "Fill all Fields!!";
}
