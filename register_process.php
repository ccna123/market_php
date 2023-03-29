<?php
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

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

    $username = htmlspecialchars(trim($_POST["username"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = $_POST["password"];
    $confirm_pass = $_POST["confirm_password"];


    $sql = "SELECT username, email FROM user_data WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $errors = check_valid($row, $username, $email, $password, $confirm_pass, $errors);

    if (count($errors) == 0) {

        $token = hash("sha256", $username.$email.uniqid());
        $hash_pass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user_data (username, password, email, token) VALUES ('$username', '$hash_pass', '$email', '$token')";
        $result = mysqli_query($conn, $sql);

        $mail = new PHPMailer(true);
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

        $_SESSION["message"] = "Register successfully";
        $_SESSION["msg_type"] = "success";
        header("location: login.php");
    } else {
        $_SESSION["register_errors"] = $errors;
        header("location: register.php");
    }
}
