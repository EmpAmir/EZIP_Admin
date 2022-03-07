<?php
session_start();
unset($_SESSION["authentication_user"]);
unset($_SESSION["auth_user"]);

$_SESSION['message'] = "Logged Out Successfully";
header("Location: login.php");
exit(0);
