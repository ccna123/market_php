<?php session_start(); ?>
<?php include("header.php"); ?>

<body>
  <!-- nav bar -->
  <!-- Navbar here -->
  <nav class="navbar navbar-expand-lg bg-secondary fixed-top">
    <div class="container">
      <a class="navbar-brand text-light fw-bold" href="home.php">コレクション</a>
      <button class="navbar-toggler ms-auto order-last" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-light" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light">
          <li class="nav-item">
            <a class="nav-link text-light fw-bold" aria-current="page" href="/market_php/home.php">ホーム</a>
          </li>
  
            <li class="nav-item">
              <a class="nav-link text-light fw-bold" href="/market_php/market.php">コレクション</a>
            </li>
         
          <li class="nav-item">
            <a class="nav-link text-light fw-bold" href="/market_php/history.php">歴史</a>
          </li>
        </ul>
        <?php include("dbconnect.php"); ?>
        <!-- check if user log in  -->
        <?php if (isset($_SESSION["user_id"])): ?>
          <?php
          $user_id = $_SESSION["user_id"];
          $record = $conn -> query("SELECT username FROM user_data WHERE id='$user_id'");
          
          
          ?>
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <span id="tt" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="bottom">
                <a class="nav-link text-light fw-bold" href="dashboard.php">ようこそ, <?= $record -> fetch_assoc()["username"] ?> </a>
              </span>
            </li>
            <li class="nav-item">
              <form action="logout_process.php" method="post">
                <input type="hidden" name="logout">
                <button type="submit" class="nav-link text-light fw-bold">ログアウト</button>
              </form>
            </li>
          </ul>
        <?php else : ?>
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link text-light fw-bold" href="/market_php/login.php">ログイン</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light fw-bold" href="/market_php/register.php">会員登録</a>
            </li>
          </ul>
        <?php endif ?>
        <!-- end if -->
      </div>

  </nav>

  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>