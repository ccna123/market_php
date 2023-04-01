<?php include_once("header.php"); ?>
  <?php include("navbar.php");?>
  <!-- !-- message -->
  <br><br>
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

  <div class="p-3 p-md-5 m-md-3 text-center position-relative overflow-hidden text-dark">
    <div class="col-md-5 p-lg-5 mx-auto my-5 rounded border bg-light card">
        <h1 class="display-4 font-weight-normal">ルービックコレクション</h1>
        <p class="lead font-weight-normal">下記のボータンをクリックして、コレクションを楽しもう</p>
        <a class="btn btn-primary" href="login.php">スタート</a>
    </div>
    <div class="product-device box-shadow d-none d-md-block"></div>
    <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
  integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
  crossorigin="anonymous"></script>
  
</body>

</html>