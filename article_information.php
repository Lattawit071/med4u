<?php
require_once './config/db_conn.inc.php';
require_once 'service/action.php';
$id_article = isset($_GET['id_article']) ? $_GET['id_article'] : null;
$sql = "SELECT * FROM article_case";
if (!empty($id_article)) {
  $sql .= " WHERE id_article = :id_article";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>สาระสุขภาพ</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo_tag.png" />
  <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/style/component.css">
  <link rel="stylesheet" href="assets/style/style.css">
  <link rel="stylesheet" href="assets/style/respon_article.css">
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
      background-color: #062E73;
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
  <!-- include component header -->
  <?php include 'components/header.php'; ?>
  <?php include 'components/nav.php'; ?>
  <div class="way" style="border-radius: 0px 100px 100px 0px; background: #044374;">
    <div class="container">
     <ul class="breadcrumbs">
      <li class="breadcrumbs__item">
        <a href="index.php?lang=<?php echo $lang?>" id="breadcrub_home" class="breadcrumbs__link">หน้าหลัก</a>
      </li>
      <li class="breadcrumbs__item">
        <a href="article_information.php?lang=<?php echo $lang?>" id="breadcrub_article" class="breadcrumbs__link">สาระสุขภาพ</a>
      </li>
     </ul>
    </div>
  </div>
  <script>
    var lang = '<?php echo $lang; ?>';
    document.getElementById('breadcrub_home').innerText = translations['breadcrub_home'][lang];
    document.getElementById('breadcrub_article').innerText = translations['breadcrub_article'][lang];
</script>
  <h2 id="article_title" style="color: #044374; text-align: center; font-size: 48px;font-style: normal;font-weight: 600;line-height: normal;">สาระสุขภาพ</h2>
  <div class="container-fuild mt-3 mb-3" style="background-color: #044374; position: relative;">
  <div class="container mt-2 mb-2 p-4">
    <div class="mx-auto" style="max-width: 1200px; max-height: 360px; margin: 10px; position: relative; background-color: #fff;">
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
            if (isset($_GET['lang'])) {
              $selectedLanguage = $_GET['lang'];
            } else {
              $selectedLanguage = 'th';
            }
            $desired_language_id = $lang;
            $i = 0;
            shuffle($article_case);
            foreach ($article_case as $row) {
              if ($row['lang'] == $selectedLanguage && $i < 5) { // Limit to 5 items
                $actives = ($i == 0) ? 'active' : '';
            ?>
              <div class="carousel-item <?php echo $actives; ?>">
                <div class="row">
                  <div class="col-md-7">
                    <img src="uploads/รูปบทความ/<?php echo $row['img']; ?>" style="object-fit: cover; width: 100%; height: 360px;">
                  </div>
                  <div class="col-md-5 d-flex mt-5">
                    <div class="title" style="text-align: justify;">
                      <h3 class="card-title" style="color: black; text-align: center;"><?php echo $row['title']; ?></h3>
                      <p class="card-title" style="color: black; padding: 8px; text-align: justify; margin-right: 20px;"><?php echo $row['review_description']; ?></p>
                      <a id="Read more" href="article_case.php?&title=<?php echo $row['title']; ?>&id=<?php echo $row['id']; ?>" style="padding: 10px;">
                          <?php
                          if ($i == 0) {
                            echo "อ่านเพิ่มเติม";
                          }elseif ($selectedLanguage == 'th') {
                            echo "อ่านเพิ่มเติม";
                          } elseif ($selectedLanguage == 'en') {
                            echo "Read more";
                          } elseif ($selectedLanguage == 'cn') {
                            echo "阅读更多";
                          } elseif ($selectedLanguage == 'jap') {
                            echo "続きを読む";
                          }
                          ?>

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
        โปรดเลือกหมวดหมู่
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" id="All" href="article_information.php?lang=<?php echo $lang?>" onclick="changeCategory('ทั้งหมด');">ทั้งหมด</a></li> 
        <li><a class="dropdown-item" id="Age 50+" href="?id_article=1&lang=<?php echo $lang?>" onclick="changeCategory('อายุ 50+');">อายุ 50+</a></li>
        <li><a class="dropdown-item" id="Young age" href="?id_article=2&lang=<?php echo $lang?>" onclick="changeCategory('อายุน้อย');">อายุน้อย</a></li>
      </ul>
    </div>
    <script>
  window.onload = function() {
    // ตรวจสอบ URL สำหรับ id_article และ lang
    var urlParams = new URLSearchParams(window.location.search);
    var idArticle = urlParams.get('id_article');
    var lang = urlParams.get('lang');

    // ถ้ามี id_article ใน URL ให้เปลี่ยนปุ่มตาม
    if (idArticle) {
      if (idArticle === '1') {
        if (lang === 'th') {
          document.getElementById('categoryBtn').innerText = 'อายุ 50+';
        } else if (lang === 'en') {
          document.getElementById('categoryBtn').innerText = 'Age 50+';
        } else if (lang === 'cn') {
          document.getElementById('categoryBtn').innerText = '年龄50+';
        } else if (lang === 'jap') {
          document.getElementById('categoryBtn').innerText = '年齢50+';
        } else if (lang === 'uae') {
          document.getElementById('categoryBtn').innerText = 'العمر 50+';
        }
      } else if (idArticle === '2') {
        if (lang === 'th') {
          document.getElementById('categoryBtn').innerText = 'อายุน้อย';
        } else if (lang === 'en') {
          document.getElementById('categoryBtn').innerText = 'Young Age';
        } else if (lang === 'cn') {
          document.getElementById('categoryBtn').innerText = '年轻的时候';
        } else if (lang === 'jap') {
          document.getElementById('categoryBtn').innerText = '年齢が若い';
        } else if (lang === 'uae') {
          document.getElementById('categoryBtn').innerText = 'سن مبكرة';
        }
      }
    }
  };
</script>

  </div>
  <div class="container mt-3">
    <div class="row justify-content-center">
      <?php
      $selectedCategory = isset($_GET['id_article']) ? $_GET['id_article'] : null;
      $lang = isset($_GET['lang']) ? $_GET['lang'] : null;

      $filteredCases = array_filter($article_case, function ($case) use ($selectedCategory, $lang) {
        return ($selectedCategory === null || $case['id_article'] == $selectedCategory) &&
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
         <div class="rounded-element-disease_case">
          <div class="card-body">
            <a href="article_case.php?&tag=article_case&title=<?php echo urlencode($row['title']); ?>&tb=article_case&id=<?php echo $row['id']; ?>&lang=<?php echo $lang; ?>">
              <img src="uploads/รูปบทความ/<?php echo $row['img']; ?>" class="rounded">
            </a>
            <div class="card-title">
              <br>
              <h5 class="card-title" style="color: black; padding: 0px 10px 0px 10px;"><?php echo $row['title']; ?></h5>
              <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; padding: 0px 10px 0px 10px;">
                <?php echo $row['review_description']; ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <div class="pagination mt-4 mb-4 d-flex justify-content-center align-items-center">
      <?php
      for ($page = 1; $page <= $totalPages; $page++) {
        $check_id_article = isset($selectedCategory) ? "&id_article=" . urlencode($selectedCategory) : "";
        $check_lang = isset($lang) ? "&lang=" . urlencode($lang) : "";
        $paginationLink = "?page=$page$check_id_article$check_lang";
      ?>
        <a href="<?php echo $paginationLink; ?>" class="btn btn-light <?php echo $page == $currentPage ? 'active' : ''; ?>" style="font-size: 16px; margin-right: 2px;"><?php echo $page; ?></a>
      <?php } ?>
    </div>

  </div>







  <!-- ปุ่ม Top scroll -->
  <div id="scroll-top" onclick="scrollToTOP()">
  <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512">
    <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/></svg>
  </div>
  <!-- Footer -->
  <?php include 'components/footer.php'; ?>
  <!-- Footer -->
  <script src="./assets/js/scroll-top.js"></script>
  <script src="bootstrap-5.3.x/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/lang.js"></script>
</body>

</html>