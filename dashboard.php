<?php include("header.php");?>

<body>
  <?php include("navbar.php") ?>
  <div id="mess_section" class="fixed-top mt-5"></div>

  <br><br><br>
  <!-- tab -->
  <div class="container">
    <h1 class="m-5 fw-bold header_page_title fw-bolder">ポケット</h1>
    <hr>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pocket-tab" data-bs-toggle="tab" data-bs-target="#pocket" type="button" role="tab" aria-controls="pocket" aria-selected="true">ポケット</button>
      </li>
    </ul>

    <!-- pocket tab -->
    <?php
    include("dbconnect.php");
    $user_id = $_SESSION["user_id"];
    $records = $conn->query("SELECT * FROM `item` WHERE id IN ( SELECT item_id FROM `pocket` WHERE pocket.user_id='$user_id');");

    ?>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="pocket" role="tabpanel" aria-labelledby="pocket-tab">
        <div class="container mt-3">
          <!-- col item -->
          <div class="row item_inventory">
            <?php while ($row = $records->fetch_assoc()) : ?>
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3 text-center">

                <div id="<?= $row["id"] ?>" class="card text-dark item_card" style="width: 18rem; min-height: 100%;" data-item-id="<?= $row["id"] ?>">
                  <img src="<?= $row["image_url"] ?>" class="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title">
                      <?= $row["name"] ?>
                    </h5>
                  </div>
                  <hr>


                  <div class="text-center">

                    <form class="info-form py-4" method="POST" action="cancel_process.php">

                      <a type="submit" href="/market_php/item_info.php?item_id=<?= $row["id"] ?>" class="btn btn-primary w-75 mb-4 fw-bold">
                        詳細
                      </a>
                      <button type="submit" id="<?= $row["id"] ?>" class="cancel_inventory_btn btn btn-danger w-75 mb-4 fw-bold" name="item_id" value="<?= $row["id"] ?>" data-item-id="<?= $row["id"] ?>">
                        キャンセル
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
  <script src="js/cancel_item.js"></script>
</body>

</html>