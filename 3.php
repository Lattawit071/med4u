<?php
require_once 'config/db_conn.inc.php';
require_once 'service/action.php';
include_once 'components/input_search.php';
$components = new components;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>โปรโมชัน</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo_tag.png" />
  <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/style/component.css">
  <link rel="stylesheet" href="assets/style/style.css">
  <link rel="stylesheet" href="assets/style/promotionstyle.css">
  <link rel="stylesheet" href="assets/fontawesome-6.4.0/css/fontawesome.css">
  <link rel="stylesheet" href="assets/fontawesome-6.4.0/css/brands.css">
  <link rel="stylesheet" href="assets/fontawesome-6.4.0/css/solid.css">
  <!-- Link Swiper's CSS -->  
  <link rel="stylesheet" href="assets/style/swiper-bundle.min.css">
  <style>
    html,
    body {
      position: relative;
      height: 100%;
    }

    body {
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    .swiper {
      width: 100%;
      height: 50%;
    }

    .swiper-slide {
      font-size: 18px;
      background: #fff;
      display: flex;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
</head>

<body>
<header class="header">
    <div class="header-container">
      <a href="<?php echo $nav_header_link; ?>" class="text-light" id="nav_vaccine"><?php echo $nav_header_title; ?></a>
      <div class="dropdown">
        <button class="dropbtn" id="selectedLanguage">
          <img src="./uploads/lang/thailand.png" alt="Language" class="flag">TH
        </button>
        <div class="dropdown-content" id="myDropdown">
          <a href="?language_id=1" onclick="changeLanguage('TH')"><img src="./uploads/lang/thailand.png" alt="Language" class="flag">TH</a>
          <a href="?language_id=3" onclick="changeLanguage('EN')"><img src="./uploads/lang/english.png" alt="Language" class="flag">EN</a>
          <a href="?language_id=2" onclick="changeLanguage('CN')"><img src="./uploads/lang/china.png" alt="Language" class="flag">CN</a>
          <a href="?language_id=4" onclick="changeLanguage('JAP')"><img src="./uploads/lang/japan.png" alt="Language" class="flag">JAP</a>
          <a href="#" onclick="changeLanguage('UAE')"><img src="./uploads/lang/arab.png" alt="Language" class="flag">UAE</a>
        </div>
      </div>
    </div>
  </header>
  <!-- include component navbar -->
  <?php include 'components/nav.php'; ?>
  <div class="container-fluid" style="background-image:url('./uploads/โปรโมชัน/bg_promotion.png'); height: 500px">
      <div class="container justify-content-center align-items-center">
        <!-- SEARCH BOX  -->
        <?php echo $components->input_button_text_search('ค้นหาจากชื่อคลินิก หรือ โรงพยาบาล'); ?>

        <div class="searchlist row text-alignt-center mt-3">
          <div id="search-list" class="container row justify-content-center"></div>
        </div>
      </div>
  </div>
  <div class="container">
    <h2 class="d-flex  mt-1 pt-2" id="disease_title" style="color:black;">โรงพยาบาลแนะนำ</h2>
  <!-- Swiper -->
  <div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php
    if (isset($_GET['lang'])) {
      $selectedLanguage = $_GET['lang'];
    } else {
      $selectedLanguage = 'th';
    }
    foreach ($hospital as $row) {
      if ($row['lang'] == $selectedLanguage) {
    ?>
        <div class="swiper-slide">
          <div class="card" style="width: 500px;">
            <img src="uploads/โปรโมชัน/<?php echo $row['img']; ?>" class="card-img-top" alt="..." style="width: 100%; height: 200px;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['name']; ?></h5>
              <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                <?php echo $row['description']; ?>
              </p>
            </div>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>
  <!-- <div class="swiper-pagination"></div> -->
</div>
  </div>

  <div class="container">
    <h2 class="d-flex  mt-1 pt-2" id="disease_title" style="color:black;">คลินิคผิวหนังและเส้นผม</h2>
  </div>
  <div class="container">
    <h2 class="d-flex  mt-1 pt-2" id="disease_title" style="color:black;">คลินิคศัลยกรรม</h2>
  </div> 
  <div class="container">
    <h2 class="d-flex  mt-1 pt-2" id="disease_title" style="color:black;">คลินิคจิตเวช</h2>
  </div>
  <div class="container">
    <h2 class="d-flex  mt-1 pt-2" id="disease_title" style="color:black;">คลินิคกายภาพบำบัด</h2>
  </div>

  <script src="assets/js/swiper-bundle.min.js"></script>
  <script src="assets/js/script_promo.js"></script>
</body>

</html>
