<?php
    session_start();
    include("dbconnect.php");
    $mess = "";
    if (isset($_POST["item_id"])) {
        $item_id = $_POST["item_id"];
        $user_id = $_SESSION["user_id"];

        $record = $conn -> query("SELECT name FROM item WHERE id='$item_id'");
        $row = $record -> fetch_assoc();
        
        $conn -> query("INSERT INTO pocket (item_id, user_id) 
        VALUES ('$item_id', '$user_id')");

        $mess .='<div>
        <div class="alert alert-success alert-dismissible fade show w-100 " role="alert">
           '.$row["name"].'をポケットに入れた
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>'; 

        echo $mess;
        exit;
    }
