<?php
    session_start();
    include("dbconnect.php");
    if (isset($_POST["login"])) {

        $errors = array();
        $username = htmlspecialchars(trim($_POST["username"]));
        $password = $_POST["password"];
        $_SESSION["is_login"] = false;
    
        $record = $conn -> query("SELECT id, username, password FROM user_data WHERE username='$username'");
        $row = $record -> fetch_assoc();
    
       if (!$row or !password_verify($password, $row["password"])) {
            $_SESSION["mess"] = "Wrong username or password";
            $_SESSION["msg_type"] = "danger";
            header("location: login.php");

       }else {
            $_SESSION["mess"] = "Login sucessfully";
            $_SESSION["msg_type"] = "success";
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["is_login"] = true;
            header("location: market.php");
            exit;
        }
    }
?>