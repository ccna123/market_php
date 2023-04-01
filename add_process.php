<?php
    session_start();
    include("dbconnect.php");
    $mess = "";
    if (isset($_POST["item_id"])) {
        $item_id = $_POST["item_id"];
        $user_id = $_SESSION["user_id"];

        $record = $conn -> query("SELECT pocket.item_id, item.name FROM pocket INNER JOIN item ON pocket.item_id = '$item_id';");
        $row = $record -> fetch_assoc();
        
        if (mysqli_num_rows($record) > 0) {
          $mess .='<div>
                <div class="alert alert-success alert-dismissible fade show w-100 " role="alert">
                  既にポケットに入れた。
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>'; 
          echo $mess;
          exit;
        } else {
          $conn -> query("INSERT INTO pocket (item_id, user_id)
          VALUES ('$item_id', '$user_id')");

          $conn -> query("SELECT pocket.item_id, item.name FROM pocket INNER JOIN item ON pocket.item_id = '$item_id';");
          $row = $record -> fetch_assoc();
          echo '<div>
        <div class="alert alert-success alert-dismissible fade show w-100 " role="alert">
           ポケットに入れた
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>';
        exit;
        }
    }