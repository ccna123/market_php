<?php include_once("header.php"); ?>
<?php
  if (!isset($_SESSION["user_id"])){
    header("location: login.php");
  };
?>
<body>
  <?php include("navbar.php") ?>
  <br><br>
  <div id="mess_section" class="fixed-top mt-5">
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
  </div>

  <br><br>

  <div class="container mt-5">
    <?php
    include("dbconnect.php");

    $start = 0;
    $rows_per_pages = 3;

    $search_item = isset($_GET["search_item"]) ? $_GET["search_item"] : "";
    $page = isset($_GET["page"]) ? $_GET["page"] : 1;

    if ($search_item) {
      $records = $conn->query("SELECT * FROM item WHERE name LIKE \"%$search_item%\"");
      $total_rows = $records->num_rows;
      $total_pages = ceil($total_rows / $rows_per_pages);
      $page = 1;
    } else {

      $records = $conn->query("SELECT * FROM item");
      $total_rows = $records->num_rows;
      $total_pages = ceil($total_rows / $rows_per_pages);
    }

    if ($page) {
      $p = $page - 1;
      $start = $p * $rows_per_pages;
    }

    $records = $conn->query("SELECT * FROM item WHERE name LIKE \"%$search_item%\" LIMIT $start, $rows_per_pages");

    ?>
    <!-- search -->
    <form class="form-inline my-2 my-lg-0" method="GET">
      <div class="row">
        <div class="col-lg-8 col-md-12 my-auto">
          <input class="form-control mr-sm-2 me-2" type="search" placeholder="検索" aria-label="Search" style=" height: 3rem;" name="search_item" value="">
        </div>
        <div class="col-lg-4 col-md-12">
          <input type="hidden" name="page" value="<?= $page ?>">
          <button class="btn btn-success my-2 my-sm-4 w-100" type="submit" style="height: 3rem;">検索</button>
        </div>
      </div>

    </form>
  </div>

  <!-- end search -->
  <!-- Items -->

  <div class="container">
    <div class="row d-flex justify-content-center gap-3">
      <!-- col item -->
      <?php while ($row = $records->fetch_assoc()) : ?>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 px-5">


          <div id="1" class="card text-dark item_card" style="width: 18rem; min-height: 100%;">
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
            <!-- level -->
            <div class="text-center text-danger fw-bold">
              <h3>
                レベル <?=$row["level"] ?>
              </h3>
            </div>
            <!-- end level -->
            <div class="text-center">

              <form class="info-form py-4" method="POST" action="add_process.php">

                <a type="submit" href="/market_php/item_info.php?item_id=<?= $row["id"] ?>" class="btn btn-primary w-75 mb-4 fw-bold">
                  詳細
                </a>
                <button type="submit" id="<?= $row["id"] ?>" class="add_inventory_btn btn btn-success w-75 mb-4 fw-bold" name="item_name" value="<?= $row["name"] ?>" data-item-id="<?= $row["id"] ?>">
                  気に入り
                </button>

              </form>
            </div>
          </div>
        </div>
      <?php endwhile ?>
      <!-- end col -->
      <!-- pagination -->
      <form method="get">
        <input type="hidden" name="search_item" value="<?= $search_item ?>">
        <nav aria-label="Page navigation example" class="my-5">
          <h4 class="text-center mb-3">ページ <?=$page?> of <?= $total_pages ?></h4>
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" href="?search_item=<?= $search_item ?>&page=1" tabindex="-1">最初</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="?search_item=<?= $search_item ?>&page=<?= ($page - 1) ?>" tabindex="-1">前へ</a>
            </li>

            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
              <li class="page-item"><a class="page-link" href="?search_item=<?= $search_item ?>&page=<?= $i ?>"><?= $i ?></a></li>
            <?php endfor ?>

            <li class="page-item">
              <a class="page-link" href="?search_item=<?= $search_item ?>&page=<?= ($page + 1) ?>">次へ</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="?search_item=<?= $search_item ?>&page=<?= $total_pages ?>">最後</a>
            </li>
          </ul>
        </nav>
        <!-- end pagination -->
      </form>

    </div>
  </div>

  <!-- end Items -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="js/add_pocket.js" type="text/javascript"></script>
</body>

</html>