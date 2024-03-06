<?php
require_once '../config/db_conn.inc.php';
require_once '../service/action.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interesting Diseases</title>
  <link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo/logo_tag.png" />
  <link rel="stylesheet" href="../bootstrap-5.3.x/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/style/component.css">
  <link rel="stylesheet" href="../assets/style/style.css">
  <style>
    .carousel-control-prev,
    .carousel-control-next {
      width: auto;
      background: transparent;
      border: none;
      font-size: 2rem;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: #3498db;
      border-radius: 50%;
      padding: 20px;
      color: #fff;
    }

    .carousel-control-prev {
      margin-left: -50px;
      margin-top: -50px;
    }

    .carousel-control-next {
      margin-right: -50px;
      margin-top: -50px;

    }
  </style>
</head>

<body>
  <header class="header">
    <div class="header-container">
      <a href="<?php echo $nav_header_link; ?>" class="text-light" id="nav_vaccine">Free Vaccine</a>
      <div class="dropdown">
        <button class="dropbtn" id="selectedLanguage">
          <img src="../uploads/lang/english.png" alt="Language" class="flag">EN
        </button>
        <div class="dropdown-content" id="myDropdown">
          <a href="../index.php"><img src="../uploads/lang/thailand.png" alt="Language" class="flag">TH</a>
          <a href="../disease_information/en.php"><img src="../uploads/lang/english.png" alt="Language" class="flag">EN</a>
          <a href="../disease_information/cn.php"><img src="../uploads/lang/china.png" alt="Language" class="flag">CN</a>
          <a href="jap.php"><img src="../uploads/lang/japan.png" alt="Language" class="flag">JAP</a>
          <a href="ar.php"><img src="../uploads/lang/arab.png" alt="Language" class="flag">AR</a>
        </div>
      </div>
    </div>
  </header>
  <div class="contianer">
    <div class="nav" id="stick-nav">
      <div class="container py-1 mb-2 mt-2 container-nav">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand" href="index">
              <img src="../assets/images/logo/logo.png" class="brand-logo" alt="logo">
            </a>

            <button class="navbar-toggler collapsed" role="button" data-bs-toggle="collapse" href="#multiCollapseExample1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="multiCollapseExample1">
              <ul class="navbar-nav">
                <li class="nav-item hover-underline-animation">
                  <a class="nav-link" id="nav_home" href="../home/en.php">Home</a>
                </li>
                <li class="nav-item hover-underline-animation">
                  <a class="nav-link" id="nav_diseases" href="../disease_information/en.php">Interesting Diseases</a>
                </li>

                <li class="nav-item hover-underline-animation">
                  <a class="nav-link" id="nav_information" href="article_information?lang=<?php echo $lang ?>">Health Tips</a>
                </li>

                <li class="nav-item hover-underline-animation">
                  <a class="nav-link" id="nav_promotion" href="promotion?lang=<?php echo $lang ?>">Hospital and Clinic</a>
                </li>
                <li class="nav-item hover-underline-animation">
                  <a class="nav-link" id="nav_review" href="review?lang=<?php echo $lang ?>">Reviews</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>

  <div class="way" style="width: 1400px; height: 40px; border-radius: 0px 100px 100px 0px; background: #044374;">
    <div class="container">
      <ul class="breadcrumbs">
        <li class="breadcrumbs__item">
          <a href="#" class="breadcrumbs__link">Home</a>
        </li>
        <li class="breadcrumbs__item">
          <a href="#" class="breadcrumbs__link">Interesting Diseases</a>
        </li>
      </ul>
    </div>
  </div>
  <h2 id="disease_title" style="color: #044374; text-align: center; font-size: 48px;font-style: normal;font-weight: 600;line-height: normal;">Interesting Diseases</h2>
  <div class="container-fuild mt-3 mb-3" style="background-color: #044374; position: relative;">
    <div class="container mt-2 mb-2 p-4">
      <div class="card mx-auto" style="width: 1200px; height: 360px; margin: 10px; border-radius:10px; position: relative;">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators" style="bottom: 10px; position: absolute; left: 0; right: 0;">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
          </div>

          <div class="carousel-inner">
            <?php
            $desired_language_id = 'en';
            $i = 0;
            shuffle($disease_case);
            foreach ($disease_case as $row) {
              if ($row['lang'] == $desired_language_id && $i < 5) {
                $actives = ($i == 0) ? 'active' : '';
            ?>
                <div class="carousel-item <?php echo $actives; ?>">
                  <div class="row">
                    <div class="col-md-7">
                      <img src="../uploads/รูปประกอบโรค/<?php echo $row['img']; ?>" class="rounded" style="object-fit: cover; width: 100%; height: 360px; border-radius: 10px;">
                    </div>
                    <div class="col-md-5 d-flex mt-5">
                      <div class="title" style="justify-content: center;">
                        <h3 class="card-title" style="color: black; text-align: center;"><?php echo $row['title']; ?></h3>
                        <p class="card-title" style="color: black; padding: 8px; margin-right: 20px;"><?php echo $row['review_description']; ?></p>
                        <a id="Read more" href="article_case.php?&tag=article_case&title=<?php echo $row['title']; ?>&tb=article_case&id=<?php echo $row['id']; ?>" style="padding: 10px;">
                          Read more
                        </a>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
                $i++;
              }
            }
            ?>
          </div>

          <!-- ปุ่มกดซ้ายขวา -->
          <div class="carousel-control-prev" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </div>
          <div class="carousel-control-next" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container text-center">
    <div class="btn-group">
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 10px;background: #D9D9D9; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);" id="categoryBtn">
        Please select a category
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" id="All" href="../disease_information/en.php" onclick="changeCategory('All');">All</a></li>
            <li><a class="dropdown-item" id="Skin and hair" href="?id_disease=1&lang=en" onclick="changeCategory('Skin and Hair');">Skin and Hair</a></li>
            <li><a class="dropdown-item" id="Eyes" href="?id_disease=2&lang=en" onclick="changeCategory('Eyes');">Eyes</a></li>
            <li><a class="dropdown-item" id="Brain" href="?id_disease=3&lang=en" onclick="changeCategory('Brain');">Brain</a></li>
            <li><a class="dropdown-item" id="Throat" href="?id_disease=4&lang=en" onclick="changeCategory('Throat');">Throat</a></li>
            <li><a class="dropdown-item" id="Obstetrics" href="?id_disease=5&lang=en" onclick="changeCategory('Obstetrics');">Obstetrics</a></li>
            <li><a class="dropdown-item" id="Intestine" href="?id_disease=6&lang=en" onclick="changeCategory('Intestine');">Intestine</a></li>
            <li><a class="dropdown-item" id="Joints" href="?id_disease=7&lang=en" onclick="changeCategory('Joints');">Joints</a></li>
            <li><a class="dropdown-item" id="Mouth" href="?id_disease=8&lang=en" onclick="changeCategory('Mouth');">Mouth</a></li>
        </ul>
    </div>
    <script>
        window.onload = function() {
            var urlParams = new URLSearchParams(window.location.search);
            var idDisease = urlParams.get('id_disease');
            if (idDisease) {
                var lang = 'en';
                var categoryBtn = document.getElementById('categoryBtn');

                switch (idDisease) {
                    case '1':
                        categoryBtn.innerText = 'Skin and Hair';
                        break;
                    case '2':
                        categoryBtn.innerText = 'Eyes';
                        break;
                    case '3':
                        categoryBtn.innerText = 'Brain';
                        break;
                    case '4':
                        categoryBtn.innerText = 'Throat';
                        break;
                    case '5':
                        categoryBtn.innerText = 'Obstetrics';
                        break;
                    case '6':
                        categoryBtn.innerText = 'Intestine';
                        break;
                    case '7':
                        categoryBtn.innerText = 'Joints';
                        break;
                    case '8':
                        categoryBtn.innerText = 'Mouth';
                        break;
                    default:
                        break;
                }
            }
        };
    </script>
</div>
  <div class="container">
    <div class="row justify-content-center">
      <?php
      $selectedCategory = isset($_GET['id_disease']) ? $_GET['id_disease'] : null;
      $lang = isset($_GET['lang']) ? $_GET['lang'] : "en"; // Updated this line

      $filteredCases = array_filter($disease_case, function ($case) use ($selectedCategory, $lang) {
        return ($selectedCategory === null || $case['id_disease'] == $selectedCategory) &&
          ($lang === null || $case['lang'] == $lang);
      });

      usort($filteredCases, function ($a, $b) {
        return $b['id'] - $a['id'];
      });

      $itemsPerPage = 9;
      $totalItems = count($filteredCases);
      $totalPages = ceil($totalItems / $itemsPerPage);
      $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
      $startIndex = ($currentPage - 1) * $itemsPerPage;
      $endIndex = min($startIndex + $itemsPerPage, $totalItems);

      foreach (array_slice($filteredCases, $startIndex, $itemsPerPage) as $row) {
      ?>
        <div class="rounded-element-disease_case" style="width: 380px; padding-bottom: 10px;">
          <div class="card-body">
            <a href="disease_case.php?&tag=disease_case&title=<?php echo urlencode($row['title']); ?>&tb=disease_case&id=<?php echo $row['id']; ?>&lang=<?php echo $lang; ?>">
              <img src="../uploads/รูปประกอบโรค/<?php echo $row['img']; ?>" class="rounded" style="width: 380px; height: 230px;">
            </a>

            <div class="card-title">
              <br>
              <h5 class="card-title" style="color: black; padding: 0px 10px 0px 10px;"><?php echo $row['title']; ?></h5>
              <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; padding: 0px 10px 0px 10px;">
                <?php echo $row['review_description']; ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <div class="pagination mt-4 mb-4 d-flex justify-content-center align-items-center">
      <?php for ($page = 1; $page <= $totalPages; $page++) { ?>
        <a href="?page=<?php echo $page; ?>&lang=<?php echo $lang; ?>" class="btn btn-light <?php echo $page == $currentPage ? 'active' : ''; ?>" style="font-size: 16px; margin-right: 2px;"><?php echo $page; ?></a>
      <?php } ?>
    </div>
  </div>

  <!-- ปุ่ม Top scroll -->
  <div id="scroll-top" onclick="scrollToTOP()">
    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512">
      <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
    </svg>
  </div>
  <!-- Footer -->
  <div class="contianer">

    <footer class="footer">
      <section class="footer-end ">
        <div class="container">
          <div class="row">
            <div class="col">
              <img src="../assets/images/logo/logo.png" id="img_footer" width="200px" height="100px" alt="">
            </div>
            <div class="col-6 mt-5">
              <div style="color: #1162A1;">
                <a href="#" id="foot_1">Personal data protextion policy</a>|
                <a href="#" id="foot_2">Cookies</a>|
                <a href="#" id="foot_3">Team and Conditions</a>
              </div>
            </div>
            <div class="col-2 mt-4">
              <a href="https://www.facebook.com/profile.php?id=100092837040004" target="_blank"><img src="../assets/images/logo/Facebook.png" alt="" style="margin-right: 15px;"></a>
              <a href="https://www.instagram.com/med4uofficial/" target="_blank"><img src="../assets/images/logo/Instagram.png" alt="" style="margin-right: 15px;"></a>
              <a href="https://www.tiktok.com/@med4uchanel?" target="_blank"><img src="../assets/images/logo/Tiktok.png" alt="" style="margin-right: 15px;"></a>
            </div>
          </div>
        </div>
    </footer>
  </div>
  <div class="border-top text-center p-3" style="background-color:#1162A1">
    <p class="text-white text-center" style="margin:0 !important;">© 2022 Company, Inc</p>
  </div>

  <!-- Footer -->
  <script src="../assets/js/scroll-top.js"></script>
  <script src="../bootstrap-5.3.x/js/bootstrap.bundle.min.js"></script>
</body>

</html>