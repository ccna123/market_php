<?php
    session_start();
    include("dbconnect.php");

    if (isset($_POST["item_id"])) {
        $item_id = $_POST["item_id"];
        $user_id = $_SESSION["user_id"];

        $record = $conn -> query("SELECT name FROM item WHERE id='$item_id'");
        $row = $record -> fetch_assoc();
        
        $conn -> query("INSERT INTO inventory (item_id, user_id, comments, rating_score, is_in_inventory) 
        VALUES ('$item_id', '$user_id', null, 0, 1)");
        
        $data = array(
            "status" => "Success"
        );
        header("Content-type: application/json; charset=UTF-8");
        echo json_encode($data);
        exit;
    }
?>