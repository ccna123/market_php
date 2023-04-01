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

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block fw-bold">
      <h4>ルービックコレクション</h4>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="https://www.facebook.com/profile.php?id=100087506030640" class="me-4 text-reset">
        <i class="bi bi-facebook"></i>
      </a>
      <a href="https://github.com/ccna123/market_php" class="me-4 text-reset">
        <i class="bi bi-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            フロンドエンド
          </h6>
          <p>
            <a href="#!" class="text-reset">HTML</a>
          </p>
          <p>
            <a href="#!" class="text-reset">CSS</a>
          </p>
          <p>
            <a href="#!" class="text-reset">JAVASCRIPT</a>
          </p>
          <p>
            <a href="#!" class="text-reset">BOOTSTRAP</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            バックエンド
          </h6>
          <p>
            <a href="#!" class="text-reset">PHP</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">連絡先</h6>
          <p class="pr-4">
          <i class="bi bi-person-fill"></i>
            グエンレニャットタン
          </p>
          <p class="pr-4">
            <i class="bi bi-house-fill"></i>
            岐阜県、関市
          </p>
          <p class="pr-4">
          <i class="bi bi-envelope-fill"></i>
            tnguyen24494@gmail.com
          </p>
          <p class="pr-4"><i class="bi bi-telephone-fill"></i> 080-2632-8344</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright:
    <a class="text-reset fw-bold">THANH</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  
</body>


</html>