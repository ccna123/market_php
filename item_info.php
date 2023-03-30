<!doctype html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include("navbar.php") ?>

    <?php
    include("dbconnect.php");
    $item_id = "";
    if (isset($_GET["item_id"])) {

        $item_id = $_GET["item_id"];
    }
    $result = $conn->query("SELECT * FROM item WHERE id='$item_id'");
    $row = $result->fetch_assoc();
    ?>
    <br><br><br>
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
                                    Level <?= $row["level"] ?>
                                </h3>
                            </div>
                            <hr>
                            <div>
                                <h2 class="text-danger fw-bold">Click links below here to buy:</h2>
                                <div>
                                    <h4>TORIBO</h4><a href="https://store.tribox.com/" target="_blank">https://store.tribox.com/</a>
                                    <h4>Amazon</h4><a href="https://www.amazon.co.jp" target="_blank">https://www.amazon.co.jp/</a>
                                    <h4>SpeedCubeShop</h4><a href="https://speedcubeshop.com/" target="_blank">https://speedcubeshop.com/</a>
                                    <h4>mastercubestore</h4><a href="https://mastercubestore.com/" target="_blank">https://mastercubestore.com/</a>
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
                    <iframe width="100%" height="620" src="<?= $row["instruction"] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <!-- end video -->
        </div>

        <div class="row rounded border border-success m-4 p-4 card" style="background-color: #86C8BC;">
            <div class="col-12">
                <div class="container">
                    <form method="POST" id="review-form">
                        <div class="star-widget ms-auto">

                            <input type="radio" name="rate" id="rate-1">
                            <label for="rate-1" class="bi bi-star-fill"></label>

                            <input type="radio" name="rate" id="rate-2">
                            <label for="rate-2" class="bi bi-star-fill"></label>

                            <input type="radio" name="rate" id="rate-3">
                            <label for="rate-3" class="bi bi-star-fill"></label>

                            <input type="radio" name="rate" id="rate-4">
                            <label for="rate-4" class="bi bi-star-fill"></label>

                            <input type="radio" name="rate" id="rate-5">
                            <label for="rate-5" class="bi bi-star-fill"></label>
                        </div>

                        <div class="form-group mt-4" style="background-color: #A3BB98;">

                            <textarea name="review_area" class="form-control" style="resize: none;" id="review_area" rows="4" placeholder="Write your review"></textarea>
                        </div>
                        <input type="hidden" name="review_item_id" value="<?= $row["id"] ?>">
                        <button id="sub-btn" type="submit" class="btn btn-primary mt-5 w-50" data-item-id="<?= $row["id"] ?>">Submit</button>
                    </form>
                </div>

            </div>
        </div>
        <hr>

        <!-- review part -->
        <div class="review_part">
            <?php include("review.php"); ?>
        </div>
        <!-- end review -->
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="star.js"></script>
</body>

</html>