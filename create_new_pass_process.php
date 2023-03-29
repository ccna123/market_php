<?php
    session_start();
    include("dbconnect.php");
    if (isset($_POST["password"]) and isset($_POST["confirm_pass"]) ) {

        $new_pass = $_POST["password"];
        $new_confirm_pass = $_POST["confirm_pass"];
        $email = $_SESSION["email"];

        if (strcmp($new_pass, $new_confirm_pass) !==0 ) {
            $_SESSION["new_pass_message"] = "Password does not match";
            $_SESSION["msg_type"] = "danger";
            
        }else{
            
            $conn -> query("UPDATE user_data SET password='$new_pass' WHERE email='$email'");
            $_SESSION["new_pass_message"] = "Password changed successfully";
            $_SESSION["msg_type"] = "success";
            header("location: create_new_pass.php");
            exit;
        }

        
    }
?>