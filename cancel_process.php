<?php
    session_start();
    include("dbconnect.php");
    $mess = "";
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
        $mess .='<div>
        <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
          Cancel '.$row["name"].' successfully
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>'; 

        echo $mess;
        exit;
    }
?>