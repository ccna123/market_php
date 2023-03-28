<?php
    session_start();
    include("dbconnect.php");
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

    
    
    if (isset($_POST["register"])) {

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
?>