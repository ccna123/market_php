<?php
include("dbconnect.php");
session_start();
$item_id = $_POST["review_item_id"];
if (empty($_POST["review_area"])) {
    $_SESSION["mess"] = "コメントを入力してください。";
    $_SESSION["msg_type"] = "danger";
    header("location: item_info.php?item_id=$item_id");
} else {
    $review = htmlspecialchars($_POST["review_area"]);
    $user_id = $_SESSION["user_id"];
    
    $conn->query("INSERT INTO `inventory` (`item_id`, `user_id`, `comments`) 
                VALUES ('$item_id', '$user_id', '$review')");
    $_SESSION["mess"] = "コメントが追加された。";
    $_SESSION["msg_type"] = "success";
    header("location: item_info.php?item_id=$item_id");
}
