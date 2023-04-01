<?php
    session_start();
    include("dbconnect.php");
    if (isset($_POST["password"]) and isset($_POST["confirm_pass"]) ) {

        $new_pass = $_POST["password"];
        $new_confirm_pass = $_POST["confirm_pass"];
        $email = $_SESSION["email"];

        if (strcmp($new_pass, $new_confirm_pass) !==0 ) {
            $_SESSION["new_pass_message"] = "パスワードが一致していない。";
            $_SESSION["msg_type"] = "danger";
            header("location: create_new_pass.php");
            exit;
            
        }else{
            $hash_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $conn -> query("UPDATE user_data SET password='$hash_pass' WHERE email='$email'");
            $_SESSION["new_pass_message"] = "パスワードが変更された。";
            $_SESSION["msg_type"] = "success";
            header("location: create_new_pass.php");
            exit;
        }

        
    }
?>