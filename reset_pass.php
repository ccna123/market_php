<?php session_start();?>
<?php include("header.php"); ?>

<body>
  <?php include("navbar.php")?>

  <!-- message -->
  <?php
  if (isset($_SESSION["message"])) : ?>
    <div>
      <div class="alert alert-<?= $_SESSION["msg_type"] ?> alert-dismissible fade show w-100 " role="alert">
        <?php echo $_SESSION["message"];  ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php unset($_SESSION["message"]); ?>
    </div>

  <?php endif ?>
  <!-- end message -->
  <br><br><br>

  <div class="container card text-center mt-5 text-dark px-5 py-5 w-75 .bg-light.bg-gradient">

    <form action="reset_pass_process.php" method="POST">

      <h1 class="h3 mb-3 font-weight-normal">
        パスワード再発行
      </h1>
      <div id="text-err">

      </div>
      <br>

      <label for="inputEmail" class="sr-only mb-3">
        メール
      </label>
      <input type="email" id="inputEmail" class="form-control" placeholder="メール" name="email"  autofocus>
    
      <br>

      <label for="inputConfirmEmail" class="sr-only mb-3">
        メール確認用
      </label>
      <input type="email" id="inputConfirmEmail" class="form-control" placeholder="メール再確認" name="confirm_email" >
      <br>

      <button id="reset" class="btn btn-lg btn-primary btn-block" type="submit" name="login">送信</button>
    </form>
  </div>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="js/reset_ajax.js"></script>
</body>

</html>