<?php
    require "vendor/autoload.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    
    include("dbconnect.php");
    session_start();

    if (isset($_POST["email"]) and isset($_POST["confirm_email"])) {
        
        $email = $_POST["email"];
        $confirm_email = $_POST["confirm_email"];

        if (strcmp($email, $confirm_email) !== 0) {
            $_SESSION["message"] = "メールが一致していない";
            $_SESSION["msg_type"] = "danger";
            header("location: reset_pass.php");
            exit();
        }else{
            $record = $conn -> query("SELECT email FROM user_data WHERE email='$email'");
            if ($record -> num_rows > 0) {
                
                $random_pass = uniqid();

                $mail = new PHPMailer(true);
                $mail -> isSMTP();
                $mail -> SMTPAuth = true;

                $mail -> Host = "smtp.gmail.com";
                $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail -> Port = 587;

                $mail -> Username = "tnguyen24494@gmail.com";
                $mail -> Password = "bcahvemlcltmxdue";

                $mail -> setFrom("tnguyen24494@gmail.com", "ADMIN");
                $mail -> addAddress($email);

                $mail -> Subject = "パスワード再発行";
                $message = "
                    こんにちは。こちらはルービックコレクションからのメールです。
                    ログインの為、下記のパスワードをご利用ください。ログイン後、セキュリティー上の問題で、
                    新しいパスワードを再設定をください。
                    $random_pass
                ";
                $mail -> Body = $message;
                $mail -> send();

                $conn -> query("UPDATE user_data SET password = '$random_pass' WHERE email='$email'");

                $_SESSION["message"] = "Check Email for password";
                $_SESSION["msg_type"] = "success";
                $_SESSION["email"] = $email;
                header("location: reset_pass.php");
            }else{
                
                $_SESSION["message"] = "Email does not exists";
                $_SESSION["msg_type"] = "danger";
                
            }
        }
    }
?>