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
  <!-- nav bar -->
  <!-- Navbar here -->
  <nav class="navbar navbar-expand-lg bg-secondary fixed-top">
    <div class="container">
      <a class="navbar-brand text-light fw-bold" href="home.php">Thanh Market</a>
      <button class="navbar-toggler ms-auto order-last" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-light" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light">
          <li class="nav-item">
            <a class="nav-link text-light fw-bold" aria-current="page" href="/market_php/home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light fw-bold" href="/market_php/market.php">Market</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light fw-bold" href="/market_php/history.php">History</a>
          </li>
        </ul>
        <?php include("dbconnect.php"); ?>
        <!-- check if user log in  -->
        <?php if (isset($_SESSION["user_id"])) : ?>
          <?php
          $user_id = $_SESSION["user_id"];
          $sql = "SELECT username FROM user_data WHERE id='$user_id'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          ?>
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link text-light fw-bold" href="dashboard.php">Welcome, <?= $row["username"] ?> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light fw-bold" href="process.php/?logout=<?=$_SESSION["user_id"] ?>">Logout</a>
            </li>
          </ul>
        <?php else : ?>
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link text-light fw-bold" href="/market_php/login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light fw-bold" href="/market_php/register.php">Register</a>
            </li>
          </ul>
        <?php endif ?>
        <!-- end if -->
      </div>

  </nav>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</body>

</html>