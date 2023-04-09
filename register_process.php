<?php
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv -> safeLoad();

session_start();
include("dbconnect.php");

function send_mail($token, $mail, $email){
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail -> Username = getenv("GMAIL_USERNAME");
    $mail -> Password = getenv("GMAIL_PASSWORD");
    $username = getenv("GMAIL_USERNAME");

    $mail->setFrom($username, "ADMIN");
    $mail->addAddress($email);

    $mail->Subject = "Member Token";
    $message = "
                こんにちは。. こちらはルービックコレクションサイトのメールです。
                ログイン用のパスワードとして下記のトークンをご利用ください。
                $token
            ";
    $mail->Body = $message;
    $mail->send();
}
    
    $username = mysqli_real_escape_string($conn, $_POST["username"]); 
    $email = mysqli_real_escape_string($conn, $_POST["email"]); 

    if (!empty($username) && !empty($email) ) {
        $record = $conn -> query("SELECT username FROM user_data WHERE username='$username'");
        
        // check username already exists
        if (mysqli_num_rows($record) > 0) {
            echo '
            <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
            ユーザ名が既に登録された。
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
                    メールが既に登録された。
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                exit;
            }
        }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
                    メールフォマードが正しくない。
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                exit;
        }

        //check password match
        $token = hash("sha256", "$username"."$email");
        $conn -> query("INSERT INTO user_data (username, email, token) VALUES ('$username', '$email', '$token')");
        
        $mail = new PHPMailer(true);
        send_mail($token, $mail, $email);
        echo "success";

        
    }else{
        echo '
        <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
        すべてのフィルドが入力必須。
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        exit;
    }
