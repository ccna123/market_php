<?php
include("dbconnect.php");
$records = $conn->query("SELECT * FROM `inventory`, `item` WHERE inventory.item_id=item.id");
?>
<div class="row item_inventory">
    <?php while ($row = $records->fetch_assoc()) : ?>
        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-12">

            <form method="post"></form>


            <div id="<?=$row["id"] ?>" class="card text-dark item_card" style="width: 18rem; min-height: 100%;" data-item-id="<?=$row["id"] ?>">
                <img src="<?= $row["image_url"] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $row["name"] ?>
                    </h5>
                </div>
                <hr>

                <div class="container mb-4">
                    <div class="star-widget text-center">
                        <span class="stars">
                            <i class="bi bi-star-fill h4"></i>
                            <i class="bi bi-star-fill h4"></i>
                            <i class="bi bi-star-fill h4"></i>
                            <i class="bi bi-star-fill h4"></i>
                            <i class="bi bi-star-fill h4"></i>
                        </span>
                    </div>
                    <input type="hidden" name="" class="avg_rating" value="4">
                </div>

                <div class="text-center">

                    <form class="info-form py-4" method="POST" action="cancel_process.php">

                        <a type="submit" href="/market_php/item_info.php/?item_id=<?= $row["id"] ?>" class="btn btn-primary w-75 mb-4 fw-bold">
                            Info
                        </a>
                        <button type="submit" id="<?= $row["id"] ?>" class="cancel_inventory_btn btn btn-danger w-75 mb-4 fw-bold" name="item_id" value="<?= $row["id"] ?>" data-item-id="<?= $row["id"] ?>">
                            Cancel
                        </button>

                    </form>
                </div>
            </div>
        </div>
    <?php endwhile ?>
</div>