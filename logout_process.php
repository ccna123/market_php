<?php
session_start();
if (isset($_POST["logout"])) {
    $_SESSION["mess"] = "ログアウトした。";
    $_SESSION["msg_type"] = "info";
    $_SESSION["is_login"] = false;
    unset($_SESSION["user_id"]);
    header("location: home.php");
    exit();
}

?>