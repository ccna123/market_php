<?php
    session_start();
    include("dbconnect.php");
    $mess = "";
    if (isset($_POST["item_id"])) {
        $item_id = $_POST["item_id"];
        $user_id = $_SESSION["user_id"];


        $conn -> query("DELETE FROM pocket WHERE item_id='$item_id' AND user_id='$user_id'");
        $mess .='<div>
        <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert">
          キャンセルした。
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>'; 

        echo $mess;
        exit;
    }
?>