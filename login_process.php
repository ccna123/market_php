<?php
    session_start();
    include("dbconnect.php");
    
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]); 

    if (!empty($username) && !empty($password)) {

        //check username and password is correct
        $record = $conn -> query("SELECT username, token FROM user_data WHERE username='$username'");
        if (mysqli_num_rows($record) === 0) {
            echo '
            <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
            ユーザ名が間違っています。
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            exit;
        }else if(strcmp($password, $record -> fetch_assoc()["token"]) !== 0){
            echo '
            <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
                パスワードが間違っています。
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            exit;
        }else{
            
            $record = $conn -> query("SELECT id FROM user_data WHERE username='$username'");
            $_SESSION["user_id"] = $record -> fetch_assoc()["id"];
            echo "success";
            exit;

        }
        
    }else{
        echo '
        <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
        すべてのフィルドが入力必須です。
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        exit;
    }
?>