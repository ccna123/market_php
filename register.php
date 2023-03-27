<!doctype html>
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
  <!-- !-- message -->
  <?php
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
      Please Create your Account
    </h1>

    <!-- Form Fields -->
    <!-- username -->
    <label for="inputUsername" class="sr-only mb-3">
      User Name
    </label>
    <input type="text" id="inputUsername" class="form-control" placeholder="User Name" name="username" required autofocus>
    <?php if (isset($er["username"])) : ?>
      <span class="mt-3 error">
        <?= $er["username"] ?>
      </span>
    <?php endif ?>
    <br>

    <!-- email -->
    <label for="inputEmail" class="sr-only mb-3">
      Email
    </label>
    <input type="email" id="inputEmai" class="form-control" placeholder="Email" name="email" required autofocus>

    <?php if (isset($er["email"])) : ?>
      <span class="mt-3 error">
        <?= $er["email"] ?>
      </span>
    <?php endif ?>
    <br>

    <!-- password -->
    <label for="inputPassword1" class="sr-only mb-3">
      Password
    </label>
    <input type="password" id="inputPassword1" class="form-control" placeholder="Password" name="password" required autofocus>
    <?php if (isset($er["pass"])) : ?>
      <span class="mt-3 error">
        <?= $er["pass"] ?>
      </span>
    <?php endif ?>
    <br>

    <label for="inputPassword2" class="sr-only mb-3">
      Password Confirmation
    </label>
    <input type="password" id="inputPassword2" class="form-control" placeholder="Confirm Password" name="confirm_password" required autofocus>
    <?php if (isset($er["pass"])) : ?>
      <span class="mt-3 error">
        <?= $er["pass"] ?>
      </span>
    <?php endif ?>
    <br>

    <div class="checkbox mb-3">
      <h6>Already have an Account?</h6>
      <a class="btn btn-sm btn-secondary" href="login_process.php">Login</a>
    </div>
    <a class="btn btn-lg btn-primary btn-block" href="register_process.php">Create Account</a>
    </form>
  </div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>

</html>