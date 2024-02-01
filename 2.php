<?php
require_once 'config/db_conn.inc.php';
include_once 'components/input_search.php';
$components = new components;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>โปรโมชั่น</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo_tag.png" />
  <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/style/component.css">
  <link rel="stylesheet" href="assets/style/style.css">
  <link rel="stylesheet" href="assets/style/promotionstyle.css">
  <link rel="stylesheet" href="assets/fontawesome-6.4.0/css/fontawesome.css">
  <link rel="stylesheet" href="assets/fontawesome-6.4.0/css/brands.css">
  <link rel="stylesheet" href="assets/fontawesome-6.4.0/css/solid.css">
</head>

<body>
  <div id="scroll-top" onclick="scrollToTOP()">
    <span>
      TOP
    </span>
  </div>


  <div class="contianer justify-content-center">
    <!-- include component navbar -->
    <?php include 'components/nav.php'; ?>

    <!-- disease -->
    <div class="p-md-5 mt-3 mb-5 bg-white rounded-container-list" style="color: #AFABAB;">
      <div class="container justify-content-center align-items-center">
        <!-- SEARCH BOX  -->
        <?php echo $components->input_button_text_search('ค้นหาจากชื่อคลินิก หรือ โรงพยาบาล'); ?>

        <div class="searchlist row text-alignt-center mt-3">
          <div id="search-list" class="container row justify-content-center"></div>
        </div>


        <!-- Promotion Highlight -->
        <div class="d-flex row justify-content-center m-5">

          <div class="rectangle col-4 m-2">
            <p>โปรโมชั่นแนะนำ</p>
          </div>
          <div class="rectangle col-4 m-2">
            <p>โปรโมชั่นสบายกระเป๋า</p>
          </div>
          <div class="rectangle col-4 m-2">
            <p>สินค้า</p>
          </div>

        </div>

        <!-- card promotion -->
        <div class="card-promotions m-5 d-flex row justify-content-center align-items-center">
        </div>


      </div>

    </div>
    <!-- Footer -->
    <?php include 'components/footer.php'; ?>
    <!-- Footer -->
  </div>
  <!-- disease -->
  </div>

  <script src="bootstrap-5.3.x/js/bootstrap.min.js"></script>
  <script src="assets/js/jqry.min.js"></script>
  <script src="assets/js/promotion.js"></script>
  <script src="assets/js/scroll-top.js"></script>
</body>

</html>