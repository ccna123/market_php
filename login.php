<?php include("header.php"); ?>

<body>
  <?php include("navbar.php")?>
  <!-- message -->
  
  <!-- end message -->
  <br><br>
  <div class="container card text-center mt-5 text-dark px-5 py-5 w-75 .bg-light.bg-gradient">

    <form action="login_process.php" method="POST">

      <h1 class="h3 mb-3 font-weight-normal">
        ログイン
      </h1>

      <div id="text-err">

      </div>

      <label for="inputUsername" class="sr-only mb-3">
        ユーザ名
      </label>
      <input type="text" id="inputUsername" class="form-control" placeholder="ユーザ名" name="username" autofocus>
      <br>

      <label for="inputPassword" class="sr-only mb-3">
        パスワード
      </label>
      <input type="password" id="inputPassword" class="form-control" placeholder="パスワード" name="password">
    
      <br>

      <div class="checkbox mb-3">
        <h6>アカウントを持っていないの？ </h6>
        <a class="btn btn-sm btn-secondary" href="register.php">登録</a>

      </div>
      <button id="login" class="btn btn-lg btn-primary btn-block" type="submit" name="login">ログイン</button>
    </form>
    <a href="reset_pass.php" class="mt-4">パスワードを忘れた？</a>
  </div>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="js/login_ajax.js"></script>
</body>

</html>