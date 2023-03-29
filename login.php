<!doctype html>
<?php session_start();?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include("navbar.php")?>

  <!-- message -->
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
  <!-- end message -->
  <br><br><br>

  <div class="container card text-center mt-5 text-dark px-5 py-5 w-75 .bg-light.bg-gradient">

    <form action="login_process.php" method="POST">

      <h1 class="h3 mb-3 font-weight-normal">
        Please sign in
      </h1>

      <br>

      <label for="inputUsername" class="sr-only mb-3">
        User Name
      </label>
      <input type="text" id="inputUsername" class="form-control" placeholder="User Name" name="username" required autofocus>
      <br>

      <label for="inputPassword" class="sr-only mb-3">
        Password
      </label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
    
      <br>

      <div class="checkbox mb-3">
        <h6>Don't Have an account? </h6>
        <a class="btn btn-sm btn-secondary" href="register.php">Register</a>

      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Log in</button>
    </form>
    <form action="" method="post">
      <input type="hidden" name="username" value="guest">
      <input type="hidden" name="password" value="guest123">
      <button type="submit" class="btn btn-success mt-4">Login as Guest</button>
    </form>
    <a href="create_new_pass.php" class="mt-4">Change Password ?</a>
    <a href="reset_pass.php" class="mt-4">Forgot Password ?</a>
  </div>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>

</html>