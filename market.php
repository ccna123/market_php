<!doctype html>
<?php session_start(); ?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
  <?php include("navbar.php") ?>

  <?php
  if (isset($_SESSION["log_mess"])) : ?>
    <div>
      <div class="alert alert-<?= $_SESSION["msg_type"] ?> alert-dismissible fade show w-100 " role="alert">
        <?php echo $_SESSION["log_mess"];  ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION["log_mess"]); ?>
    </div>
  <?php endif ?>
  <br><br><br>
  <div class="container mt-5">
    <!-- search -->
    <form class="form-inline my-2 my-lg-0" method="GET">
      <div class="row">
        <div class="col-lg-8 col-md-12 my-auto">
          <input class="form-control mr-sm-2 me-2" type="search" placeholder="Search" aria-label="Search" style=" height: 3rem;" name="search-item">
        </div>
        <div class="col-lg-4 col-md-12">
          <button class="btn btn-success my-2 my-sm-4 w-100" type="submit" style="height: 3rem;">Search</button>
        </div>
      </div>

    </form>
    <!-- end search -->
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>

</html>