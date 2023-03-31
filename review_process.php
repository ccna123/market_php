<?php
include("dbconnect.php");
session_start();
$html = "";
if (!isset($_POST["item_id"]) or !isset($_POST["rating"]) or !isset($_POST["review"])) {
    echo "Error";
} else {
    $item_id = $_POST["item_id"];
    $rating = $_POST["rating"];
    $review = $_POST["review"];
    $user_id = $_SESSION["user_id"];

    $conn->query("INSERT INTO `inventory` (`item_id`, `user_id`, `comments`, `rating_score`) 
                VALUES ('$item_id', '$user_id', '$review', '$rating')");

    $records = $conn->query(
        "SELECT DISTINCT username, comments, rating_score, item.name 
        FROM inventory 
        INNER JOIN user_data ON inventory.user_id = user_data.id
        INNER JOIN item ON inventory.item_id = item.id
        WHERE inventory.item_id = '$item_id'
               "
    );
    $html .= '
            <div class="container card">
                <h1 class="mb-4 mt-3" style="color: #020603;">Customer Review</h1>';

    while ($row = $records->fetch_assoc()) {
        $html .= '
                <div class="row">
                    <div class="col-12" style="text-align: left;">
                        <h4>' . $row["username"] . '<span class="h5" style="margin-left: 2rem;">2023</span></h4>
                        <h5>' . $row["rating_score"] . '</h5>
                        <p>' . $row["comments"] . '</p>
                        <hr>
                    </div>
                </div>';
    }
    $html .= '</div>';

    $data = array(
        "status" => "Success",
        "review" => $html
    );
    header("Content-type: application/json; charset=UTF-8");
    echo $html;
}
