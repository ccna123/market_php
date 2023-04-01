<?php
session_start();
if (isset($_POST["logout"])) {
    $_SESSION["mess"] = "ログアウトした。";
    $_SESSION["msg_type"] = "info";
    unset($_SESSION["user_id"]);
    header("location: home.php");
    exit();
}

?>