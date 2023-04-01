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

