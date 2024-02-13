<?php
require_once 'config/db_conn.inc.php';
require_once 'service/action.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>โรงพยาบาลและคลินิก</title>
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

    .swiper-navBtn {
      color: #000;
      height: 40px;
      width: 40px;
      background: #fff;
      border-radius: 50%;
    }

    .swiper-navBtn::before,
    .swiper-navBtn::after {
      font-size: 18px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      color: #000;
      height: 40px;
      width: 40px;
      background-color: #fff;
      border-radius: 50%;

    }

    .carousel-control-prev-icon::before,
    .carousel-control-next-icon::before {
      content: '❮';
      color: #000;
      font-size: 30px;
    }

    .carousel-control-next-icon::before {
      content: '❯';
    }
  </style>
</head>

<body>
  <!-- include component header -->
  <?php include 'components/header.php'; ?>
  <!-- include component navbar -->
  <?php include 'components/nav.php'; ?>
  <div class="way" style="width: 1400px; height: 40px; border-radius: 0px 100px 100px 0px; background: #044374;">
    <div class="container">
      <ul class="breadcrumbs">
        <li class="breadcrumbs__item">
          <a href="index.php?lang=<?php echo $lang ?>" class="breadcrumbs__link">หน้าหลัก</a>
        </li>
        <li class="breadcrumbs__item">
          <a href="promotion.php?lang=<?php echo $lang ?>" class="breadcrumbs__link">โรงพยาบาลและคลินิก</a>
        </li>
      </ul>
    </div>
  </div>
  <h2 id="hos" style="color: #044374; text-align: center; font-size: 48px;font-style: normal;font-weight: 600;line-height: normal;">โรงพยาบาลและคลินิก</h2>
  <div class="container-fluid" style="background-image:url('./uploads/โปรโมชัน/bg_promotion.png'); height: 500px; display: flex; justify-content: center; align-items: center;">
    <form action="#" method="POST" class="p-3" style="position: relative;">
      <div class="search-box" style="width: 780px; height: 70px; position: relative;">
        <input type="text" id="hospital-box" name="search" class="input-search" placeholder="ค้นหาชื่อโรงพยาบาลหรือคลีนิค" aria-describedby="button-addon2">
        <div class="input-group-append">
            <span class="fas fa-search" style="left: 720px;"></span>
        </div>
        <div id="hospitalList" class="autocomplete-items">
        </div>
      </div>
    </form>
  </div>
  <div class="container">
    <h2 class="d-flex mt-5 pt-2" id="" style="color: #062E73; margin-bottom: 10px;">โปรโมชันแนะนำ</h2>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner" style="width: 1300px; height: 500px;">
        <?php
        $i = 0;
        foreach ($promotion as $row) {
          $actives = ($i == 0) ? 'active' : '';
        ?>
          <div class="carousel-item <?php echo $actives; ?>">
            <a href="promotion_case.php?&tag=promotion_case&promotion_case&id=<?php echo $row['id']; ?>">
              <img src="uploads/โปรโมชัน/<?php echo $row['img']; ?>" class="rounded" style="object-fit: cover; width: 100%; border-radius: 10px;">
            </a>
          </div>
        <?php
          $i++;
        }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="container">
    <h2 class="d-flex  mt-1 pt-2" id="disease_title" style="color: #062E73;">โรงพยาบาลแนะนำ</h2>
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
      <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
      <!-- <div class="swiper-pagination"></div> -->
    </div>
  </div>
  </div>
  <div class="container">
    <h2 class="d-flex  mt-1 pt-2" id="disease_title" style="color:black;">คลินิคผิวหนังและเส้นผม</h2>
  </div>
  <!-- <div class="container">
    <h2 class="d-flex  mt-1 pt-2" id="disease_title" style="color:black;">คลินิคศัลยกรรม</h2>
  </div> 
  <div class="container">
    <h2 class="d-flex  mt-1 pt-2" id="disease_title" style="color:black;">คลินิคจิตเวช</h2>
  </div>
  <div class="container">
    <h2 class="d-flex  mt-1 pt-2" id="disease_title" style="color:black;">คลินิคกายภาพบำบัด</h2>
  </div> -->


  <!-- ปุ่ม Top scroll -->
  <div id="scroll-top" onclick="scrollToTOP()">
    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512">
      <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
    </svg>
  </div>
  <!-- Footer -->
  <?php include 'components/footer.php'; ?>
  <!-- Footer -->
  <script type="text/javascript" src="./assets/js/jquery.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$("#hospital-box").keyup(function(){
		var hospital = $(this).val();

		if(hospital != ''){
			$.ajax({
				url: "load-hospital.php",
				method: "POST",
				data: {hospital: hospital},
				success: function(data){
					console.log(data);
					$("#hospitalList").fadeIn("fast").html(data);
				}
			});
		} else {
			$("#hospitalList").fadeOut();
		}
	});

	$(document).on('click','#hospitalList div',function(){
		$('#hospital-box').val($(this).text());
		$('#hospitalList').fadeOut();
	});

  });
</script>
  <script src="./assets/js/scroll-top.js"></script>
  <script src="bootstrap-5.3.x/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/lang.js"></script>
  <script src="assets/js/swiper-bundle.min.js"></script>
  <script src="assets/js/script_promo.js"></script>
</body>

</html>