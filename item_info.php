<?php include("header.php");?>

<body>
    <?php include("navbar.php") ?>
    <br><br>
    <?php
        if (isset($_SESSION["mess"])) : ?>
        <div class="">
        <div class="alert alert-<?= $_SESSION["msg_type"] ?> alert-dismissible fade show w-100 " role="alert">
            <?php echo $_SESSION["mess"];  ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION["mess"]); ?>
        </div>

    <?php endif ?>
    
    <?php
    include("dbconnect.php");
    $item_id = "";
    if (isset($_GET["item_id"])) {

        $item_id = $_GET["item_id"];
    }
    $result = $conn->query("SELECT * FROM item WHERE id='$item_id'");
    $row = $result->fetch_assoc();
    ?>
    <br><br>
    <div class="container text-center mt-5">
        <div class="row">
            <!-- item -->
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card-wrapper justify-content-center d-flex">
                    <div class="card" style="width: 30rem;">
                        <img class="card-img-top" src="<?= $row["image_url"] ?>" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <div class="text-center h1">
                                <?= $row["name"] ?>
                            </div>
                            <div class="text-center text-danger fw-bold">
                                <h3>
                                    レベル
                                    <?= $row["level"] ?>
                                </h3>
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-danger fw-bold">購入先のリンク</h2>
                                <div>
                                    <h4>TORIBO</h4><a href="https://store.tribox.com/"
                                        target="_blank">https://store.tribox.com/</a>
                                    <h4>Amazon</h4><a href="https://www.amazon.co.jp"
                                        target="_blank">https://www.amazon.co.jp/</a>
                                    <h4>SpeedCubeShop</h4><a href="https://speedcubeshop.com/"
                                        target="_blank">https://speedcubeshop.com/</a>
                                    <h4>mastercubestore</h4><a href="https://mastercubestore.com/"
                                        target="_blank">https://mastercubestore.com/</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end item -->

            <!-- video -->
            <div class="col-12 col-md-6 col-lg-6" style="height: 100%;">
                <div style="height: 100%;">
                    <iframe width="100%" height="620" src="<?= $row["instruction"] ?>" title="YouTube video player"
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;
                        picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <!-- end video -->
        </div>

        <div class="row rounded border border-success m-4 p-4 card" style="background-color: #86C8BC;">
            <div class="col-12">
                <div class="container">
                    <form method="POST" id="review-form" action="review_process.php">

                        <div class="form-group mt-4" style="background-color: #A3BB98;">

                            <textarea name="review_area" class="form-control" style="resize: none;" id="review_area"
                                rows="4" placeholder="コメント入力"></textarea>
                        </div>
                        <input type="hidden" name="review_item_id" value="<?= $row["id"] ?>">
                        <button id="sub-btn" type="submit" class="btn btn-primary mt-5 w-50">送信</button>
                    </form>
                </div>

            </div>
        </div>
        <hr>
        <?php
            include("dbconnect.php");
            $item_id = $_GET["item_id"];

            $records = $conn -> query(
                "SELECT DISTINCT username, comments, item.name 
                FROM inventory 
                INNER JOIN user_data ON inventory.user_id = user_data.id
                INNER JOIN item ON inventory.item_id = item.id
                WHERE inventory.item_id = '$item_id' AND inventory.comments IS NOT NULL
                ORDER BY inventory.id DESC;
                "
            );
        ?>
        <!-- review part -->
        <div class="review_part">
            <div class="container card">
                <h1 class="mb-4 mt-3" style="color: #020603;">コメント</h1>
                <?php while ($row = $records -> fetch_assoc()): ?>
                <div class="row">
                    <div class="col-12" style="text-align: left;">
                        <h4>
                            <?=$row["username"] ?><span class="h5" style="margin-left: 2rem;">
                                <?php print(date("Y/m/d"))?>
                            </span>
                        </h4>
                        <p>
                            <?=$row["comments"] ?>
                        </p>
                        <hr>
                    </div>
                </div>
                <?php endwhile ?>



            </div>
        </div>


    </div>
    <!-- end review -->
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
</body>

</html>