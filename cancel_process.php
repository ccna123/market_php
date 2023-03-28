<?php
    session_start();
    include("dbconnect.php");

    if (isset($_POST["item_id"])) {
        $item_id = $_POST["item_id"];
        $user_id = $_SESSION["user_id"];

        $record = $conn -> query("SELECT name FROM item WHERE id='$item_id'");
        $row = $record -> fetch_assoc();

        $conn -> query("DELETE FROM inventory WHERE item_id='$item_id'");
        $data = array(
            "message" => "Cancel ".$row["name"]." successfully",
            "status" => "Success"
        );
        header("Content-type: application/json; charset=UTF-8");
        echo json_encode($data);
        exit;
    }
?>