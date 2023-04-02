<?php
    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv -> safeLoad();

    include("dbconnect.php");
    session_start();

    if (!empty($_POST["email"]) and !empty($_POST["confirm_email"])) {
        
        $email = $_POST["email"];
        $confirm_email = $_POST["confirm_email"];

        // check email are the same
        if (strcmp($email, $confirm_email) !== 0) {
            echo '
                <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
                    メールが一致していない。
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            exit();
        }
        
        // check email valid 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '
                <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
                メールフォマードが正しくない。
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                exit;
        }
        
        $record = $conn -> query("SELECT username, email FROM user_data WHERE email='gotraporti@gufum.com'");
                
        $random_pass = hash("sha256", $record->fetch_assoc()["username"].$email.uniqid());

        $mail = new PHPMailer(true);
        $mail -> isSMTP();
        $mail -> SMTPAuth = true;

        $mail -> Host = "smtp.gmail.com";
        $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail -> Port = 587;

        $mail -> Username = getenv("GMAIL_USERNAME");
        $mail -> Password = getenv("GMAIL_PASSWORD");
        $username = getenv("GMAIL_USERNAME");

        $mail -> setFrom($username, "ADMIN");
        $mail -> addAddress($email);

        $mail -> Subject = "パスワード再発行";
        $message = "
                    こんにちは。こちらはルービックコレクションからのメールです。
                    ログインの為、下記のパスワードをご利用ください。
                    $random_pass
                ";
        $mail -> Body = $message;
        $mail -> send();

        $conn -> query("UPDATE user_data SET token = '$random_pass' WHERE email='$email'");

        echo '
                <div class="alert alert-success alert-dismissible fade show w-100 " role="alert">
                    パスワードがリセットされた。メールをご確認ください。
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        exit;
            
    }else{
                
            echo '
            <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
            すべてのフィルドが入力必須。
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            exit;
        }
?>