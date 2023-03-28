<?php
    session_start();
    include("dbconnect.php");
    if (isset($_POST["login"])) {

        $errors = array();
        $username = trim($_POST["username"]);
        $password = $_POST["password"];
    
        $sql = "SELECT * FROM user_data WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    
        if (!$row) {
            $errors["log_username"] = "Wrong username";
        } else {
            if ($password != $row["password"]) {
                $errors["log_pass"] = "Wrong password";
            }
        }
    
        if (count($errors) > 0) {
            $_SESSION["mess"] = $errors;
            header("location: login.php");
        } else {
            $_SESSION["mess"] = "Login sucessfully";
            $_SESSION["msg_type"] = "success";
            $_SESSION["user_id"] = $row["id"];
            header("location: market.php");
        }
    }
?>