<?php
session_start();
if (isset($_POST["logout"])) {
    $_SESSION["log_mess"] = "Logout sucessfully";
    $_SESSION["msg_type"] = "info";
    unset($_SESSION["user_id"]);
    header("location: http://localhost:8080/market_php/home.php");
    exit();
}

?>