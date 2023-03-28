<!doctype html>
<?php session_start(); ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include("navbar.php") ?>
  <?php
  if (isset($_SESSION["mess"])) : ?>
    <div>
      <div class="alert alert-<?= $_SESSION["msg_type"] ?> alert-dismissible fade show w-100 " role="alert">
        <?php echo $_SESSION["mess"];  ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION["mess"]); ?>
    </div>
  <?php endif ?>

  <br><br>
  <!-- tab -->
  <div class="container">
    <h1 class="m-5 fw-bold header_page_title fw-bolder">YOUR ITEMS</h1>
    <hr>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pocket-tab" data-bs-toggle="tab" data-bs-target="#pocket" type="button" role="tab" aria-controls="pocket" aria-selected="true">Pocket</button>
      </li>
    </ul>

    <!-- pocket tab -->
    <?php
    include("dbconnect.php");
    $user_id = $_SESSION["user_id"];
    $records = $conn->query("SELECT * FROM `item` WHERE id IN ( SELECT item_id FROM `inventory` WHERE inventory.user_id='$user_id');");

    ?>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="pocket" role="tabpanel" aria-labelledby="pocket-tab">
        <div class="container mt-3">
          <!-- col item -->
          <div class="row item_inventory">
            <?php while ($row = $records->fetch_assoc()) : ?>
              <div class="col-xl-3 col-lg-4 col-md-3 col-sm-12">

                <div id="<?= $row["id"] ?>" class="card text-dark item_card" style="width: 18rem; min-height: 100%;" data-item-id="<?= $row["id"] ?>">
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

                      <a type="submit" href="/market_php/item_info.php?item_id=<?= $row["id"] ?>" class="btn btn-primary w-75 mb-4 fw-bold">
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
          <!-- end col item -->
        </div>
      </div>
    </div>

  </div>
  <!-- end tab -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="cancel_item.js"></script>
</body>

</html>