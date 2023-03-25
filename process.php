<?php

session_start();
include "dbconnect.php";

function check_valid($row, $username, $email, $password, $confirm_pass, $errors)
{
    $errors = array();
    if ($row["username"] != null && $row["username"] === $username) {
        $errors["username"] =  "Username already exists";
    }

    if ($row["email"] != null && $row["email"] === $email) {
        $errors["email"] = "Email already exists";
    }

    if ($password != $confirm_pass) {
        $errors["pass"] = "Password do not match";
    }
    return $errors;
}

if (isset($_POST["create"])) {

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_pass = $_POST["confirm_password"];


    $sql = "SELECT username, email FROM user_data WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $errors = check_valid($row, $username, $email, $password, $confirm_pass, $errors);

    if (count($errors) == 0) {

        $sql = "INSERT INTO user_data (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($conn, $sql);

        $_SESSION["message"] = "Register successfully";
        $_SESSION["msg_type"] = "success";
        header("location: login.php");
    } else {
        $_SESSION["register_errors"] = $errors;
        header("location: register.php");
    }
} 
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
        $_SESSION["log_err"] = $errors;
        header("location: login.php");
        
    } else {
        $_SESSION["log_mess"] = "Login sucessfully";
        $_SESSION["msg_type"] = "success";
        $_SESSION["user_id"] = $row["id"];
        header("location: market.php");
    }
    
}

if (isset($_GET["logout"])) {
    $_SESSION["log_mess"] = "Logout sucessfully";
    $_SESSION["msg_type"] = "info";
    unset($_SESSION["user_id"]);
    header("location: http://localhost:8080/market_php/home.php");
}
