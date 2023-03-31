<?php
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

session_start();
include("dbconnect.php");

function send_mail($token, $mail, $email){
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "tnguyen24494@gmail.com";
    $mail->Password = "bcahvemlcltmxdue";

    $mail->setFrom("tnguyen24494@gmail.com", "ADMIN");
    $mail->addAddress($email);

    $mail->Subject = "Member Token";
    $message = "
                Hello. This mail is from rubik-collections.com
                Please use this token as a ticket for discount when buying products
                $token
            ";
    $mail->Body = $message;
    $mail->send();
}
    
    $username = mysqli_real_escape_string($conn, $_POST["username"]); 
    $email = mysqli_real_escape_string($conn, $_POST["email"]); 
    $password = mysqli_real_escape_string($conn, $_POST["password"]); 
    $confirm_password = mysqli_real_escape_string($conn, $_POST["confirm_password"]); 

    if (!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password) ) {
        $record = $conn -> query("SELECT username FROM user_data WHERE username='$username'");
        
        // check username already exists
        if (mysqli_num_rows($record) > 0) {
            echo '
            <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
            Username already exists
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        exit;
        }
        
        // check email valid 
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $record = $conn -> query("SELECT username, email FROM user_data WHERE email='$email'");
            if (mysqli_num_rows($record) > 0) {
                echo '
                <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
                    Email already exists
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                exit;
            }
        }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
                    Invalid email format
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                exit;
        }

        //check password match
        if (strcmp($password, $confirm_password) !==0 ) {
            echo '
                <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
                    Password do not match
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                exit;
        }
        $hash_pass = password_hash($password, PASSWORD_DEFAULT);
        $conn -> query("INSERT INTO user_data (username, password, email) VALUES ('$username', '$hash_pass', '$email')");
        
        $token = hash("sha256", "$username"."$email");
        $mail = new PHPMailer(true);
        send_mail($token, $mail, $email);
        echo "success";

        
    }else{
        echo '
        <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
        All input are required
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        exit;
    }

