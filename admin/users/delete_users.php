<?php 
include 'dbConn.php';
$data = stripslashes(file_get_contents("php://input")) ;
$mydata = json_decode($data,true);
$id = $mydata['sid'];

//deleteing student 
if (!empty($id)) {
    $sql = "DELETE FROM sale WHERE  id={$id}";
    if ($conn->query($sql) == TRUE) {
        echo 1;
} else {
    echo 0;
}
}
?>