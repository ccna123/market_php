<?php include("header.php"); ?>

<body>

  <?php include("navbar.php")?>
  <!-- !-- message -->
  <?php
  var_dump($_ENV);
  if (isset($_SESSION["message"])) : ?>
    <div class="">
      <div class="alert alert-<?= $_SESSION["msg_type"] ?> alert-dismissible fade show w-100 " role="alert">
        <?php echo $_SESSION["message"];  ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION["message"]); ?>
    </div>

  <?php endif ?>
  <!-- end message -->

  <br><br><br>

  <?php if (isset($_SESSION["register_errors"])) {
    $er = $_SESSION["register_errors"];
    unset($_SESSION["register_errors"]);
  }
  ?>
  <div class="container text-center card mt-5 text-dark px-5 py-5 w-75 .bg-light.bg-gradient"">

    <form action="register_process.php" method="POST">

    <h1 class="h3 mb-3 font-weight-normal">
      アカウント作成
    </h1>

    <!-- Form Fields -->
    <!-- username -->
    <label for="inputUsername" class="sr-only mb-3">
      ユーザ名
    </label>
    <input type="text" id="inputUsername" class="form-control" placeholder="ユーザ名" name="username" required autofocus>
    <?php if (isset($er["username"])) : ?>
      <span class="mt-3 error">
        <?= $er["username"] ?>
      </span>
    <?php endif ?>
    <br>

    <!-- email -->
    <label for="inputEmail" class="sr-only mb-3">
      メール
    </label>
    <input type="email" id="inputEmai" class="form-control" placeholder="メール" name="email" required autofocus>

    <?php if (isset($er["email"])) : ?>
      <span class="mt-3 error">
        <?= $er["email"] ?>
      </span>
    <?php endif ?>
    <br>

    <!-- password -->
    <label for="inputPassword1" class="sr-only mb-3">
      パスワード
    </label>
    <input type="password" id="inputPassword1" class="form-control" placeholder="パスワード" name="password" required autofocus>
    <?php if (isset($er["pass"])) : ?>
      <span class="mt-3 error">
        <?= $er["pass"] ?>
      </span>
    <?php endif ?>
    <br>

    <label for="inputPassword2" class="sr-only mb-3">
      パスワード確認用
    </label>
    <input type="password" id="inputPassword2" class="form-control" placeholder="パスワード再入力" name="confirm_password" required autofocus>
    <?php if (isset($er["pass"])) : ?>
      <span class="mt-3 error">
        <?= $er["pass"] ?>
      </span>
    <?php endif ?>
    <br>

    <div class="checkbox mb-3">
      <h6>アカウントを既に持っている？</h6>
      <a class="btn btn-sm btn-secondary" href="login.php">ログイン</a>
    </div>
    <button type="submit" name="register" class="btn btn-lg btn-primary btn-block">アカウント作成</button>
    </form>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>

</html>