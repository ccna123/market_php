<?php
    include("dbconnect.php");
    $item_id = $_GET["item_id"];

    $records = $conn -> query(
        "SELECT DISTINCT username, comments, rating_score, item.name 
        FROM inventory 
        INNER JOIN user_data ON inventory.user_id = user_data.id
        INNER JOIN item ON inventory.item_id = item.id
        WHERE inventory.item_id = '$item_id' AND inventory.comments IS NOT NULL
        "
    );
?>
<div class="container card">
    <h1 class="mb-4 mt-3" style="color: #020603;">コメント</h1>
    <?php while ($row = $records -> fetch_assoc()): ?>  
        <div class="row">
            <div class="col-12" style="text-align: left;">
                <h4><?=$row["username"] ?><span class="h5" style="margin-left: 2rem;"><?php print(date("Y/m/d"))?></span></h4>
                <h5><?=$row["rating_score"] ?></h5>
                <p>
                <?=$row["comments"] ?>
                </p>
                <hr>
            </div>
        </div>
    <?php endwhile ?>
</div>
