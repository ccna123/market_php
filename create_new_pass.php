<?php session_start();?>
<?php include("header.php"); ?>

<body>
  <?php include("navbar.php")?>

  <!-- message -->
  <?php
  if (isset($_SESSION["new_pass_message"])) : ?>
    <div class="">
      <div class="alert alert-<?= $_SESSION["msg_type"] ?> alert-dismissible fade show w-100 " role="alert">
        <?php echo $_SESSION["new_pass_message"];  ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION["new_pass_message"]); ?>
    </div>

  <?php endif ?>
  <!-- end message -->
  <br><br><br>

  <div class="container card text-center mt-5 text-dark px-5 py-5 w-75 .bg-light.bg-gradient">

    <form action="create_new_pass_process.php" method="POST">

      <h1 class="h3 mb-3 font-weight-normal">
        Enter new password
      </h1>

      <br>

      <label for="inputPassword" class="sr-only mb-3">
        新パスワード
      </label>
      <input type="password" id="inputPassword" class="form-control" placeholder="パスワード" name="password" required autofocus>
    
      <br>

      <label for="inputConfirmPass" class="sr-only mb-3">
        パスワード再入力
      </label>
      <input type="password" id="inputConfirmPass" class="form-control" placeholder="パスワード再入力" name="confirm_pass" required>
      <br>

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">送信</button>
    </form>
    <a class="mt-3" href="login.php">ログイン</a>
  </div>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>

</html>