<?php
    session_start();
    include("dbconnect.php");
    $mess = "";
    if (isset($_POST["item_id"])) {
        $item_id = $_POST["item_id"];
        $user_id = $_SESSION["user_id"];

        $record = $conn -> query("SELECT name FROM item WHERE id='$item_id'");
        $row = $record -> fetch_assoc();
        
        $conn -> query("INSERT INTO inventory (item_id, user_id, comments, rating_score, is_in_inventory) 
        VALUES ('$item_id', '$user_id', null, 0, 1)");

        $mess .='<div>
        <div class="alert alert-success alert-dismissible fade show w-100 " role="alert">
          Add '.$row["name"].' successfully
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>'; 

        echo $mess;
        exit;
    }
