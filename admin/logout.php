<?php
    session_start();
    unset($_SESSION["authentication"]);
    unset($_SESSION["auth_admin"]);

    $_SESSION['message'] = "Logged Out Successfully";
    header("Location: admin_login.php");
    exit(0);
