<?php
require_once './config/db_conn.inc.php';
require_once 'service/action.php';
// // $id_disease = isset($_GET['id_disease']) ? $_GET['id_disease'] : null;
// $sql = "SELECT * FROM disease_case";
// if (!empty($id_disease)) {
//   $sql .= " WHERE id_disease = :id_disease";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>โรคน่ารู้</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo_tag.png" />
  <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/style/component.css">
  <link rel="stylesheet" href="assets/style/style.css">
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
  <!-- include component header -->
  <?php include 'components/header.php'; ?>
  <?php include 'components/nav.php'; ?>

  <div class="way" style="width: 1400px; height: 40px; border-radius: 0px 100px 100px 0px; background: #044374;">
    <div class="container">
      <ul class="breadcrumbs">
        <li class="breadcrumbs__item">
          <a href="index.php?lang=<?php echo $lang ?>" class="breadcrumbs__link">หน้าหลัก</a>
        </li>
        <li class="breadcrumbs__item">
          <a href="disease_information.php?lang=<?php echo $lang ?>" class="breadcrumbs__link">โรคน่ารู้</a>
        </li>
      </ul>
    </div>
  </div>
  <h2 id="disease_title" style="color: #044374; text-align: center; font-size: 48px;font-style: normal;font-weight: 600;line-height: normal;">โรคน่ารู้</h2>
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
            $selectedLanguage = $lang;
            $i = 0;
            foreach ($disease_case as $row) {
              if ($row['lang'] == $selectedLanguage) {
                $actives = ($i == 0) ? 'active' : '';
            ?>
                <div class="carousel-item <?php echo $actives; ?>">
                  <div class="row">
                    <div class="col-md-7">
                      <img src="uploads/รูปประกอบโรค/<?php echo $row['img']; ?>" class="rounded" style="object-fit: cover; width: 100%; height: 360px; border-radius: 10px;">
                    </div>
                    <div class="col-md-5 d-flex mt-5">
                      <div class="title" style="justify-content: center;">
                        <h3 class="card-title" style="color: black; text-align: center;"><?php echo $row['title']; ?></h3>
                        <p class="card-title" style="color: black; padding: 8px; margin-right: 20px;"><?php echo $row['review_description']; ?></p>
                        <a id="Read more" href="article_case.php?&tag=article_case&title=<?php echo $row['title']; ?>&tb=article_case&id=<?php echo $row['id']; ?>" style="padding: 10px;">
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
        <li><a class="dropdown-item" id="All" href="disease_information.php?&lang=<?php echo $lang ?>" onclick="changeCategory('ทั้งหมด');">ทั้งหมด</a></li>
        <li><a class="dropdown-item" id="Skin and hair" href="?id_disease=1&lang=<?php echo $lang ?>" onclick="changeCategory('ผิวหนังและเส้นผม');">ผิวหนังและเส้นผม</a></li>
        <li><a class="dropdown-item" id="Eyes" href="?id_disease=2&lang=<?php echo $lang ?>" onclick="changeCategory('ตา');">ตา</a></li>
        <li><a class="dropdown-item" id="Brain" href="?id_disease=3&lang=<?php echo $lang ?>" onclick="changeCategory('สมอง');">สมอง</a></li>
        <li><a class="dropdown-item" id="Throat" href="?id_disease=4&lang=<?php echo $lang ?>" onclick="changeCategory('ลำคอ');">ลำคอ</a></li>
        <li><a class="dropdown-item" id="Obstetrics" href="?id_disease=5&lang=<?php echo $lang ?>" onclick="changeCategory('สูติ');">สูติ</a></li>
        <li><a class="dropdown-item" id="Intestine" href="?id_disease=6&lang=<?php echo $lang ?>" onclick="changeCategory('ลำไส้');">ลำไส้</a></li>
        <li><a class="dropdown-item" id="Joints" href="?id_disease=7&lang=<?php echo $lang ?>" onclick="changeCategory('ข้อ');">ข้อ</a></li>
        <li><a class="dropdown-item" id="Mouth" href="?id_disease=8&lang=<?php echo $lang ?>" onclick="changeCategory('ช่องปาก');">ช่องปาก</a></li>
      </ul>
    </div>
    <script>
      window.onload = function() {
        // ตรวจสอบ URL สำหรับ id_disease และ lang
        var urlParams = new URLSearchParams(window.location.search);
        var idDisease = urlParams.get('id_disease');
        var lang = urlParams.get('lang');

        // ถ้ามี id_disease ใน URL ให้เปลี่ยนปุ่มตาม
        if (idDisease) {
          if (idDisease === '1') {
            if (lang === 'th') {
              document.getElementById('categoryBtn').innerText = 'ผิวหนังและเส้นผม';
            } else if (lang === 'en') {
              document.getElementById('categoryBtn').innerText = 'Skin and Hair';
            } else if (lang === 'cn') {
              document.getElementById('categoryBtn').innerText = '皮肤和头发';
            } else if (lang === 'jap') {
              document.getElementById('categoryBtn').innerText = '皮膚と髪';
            } else if (lang === 'uae') {
              document.getElementById('categoryBtn').innerText = 'الجلد والشعر';
            }
          } else if (idDisease === '2') {
            if (lang === 'th') {
              document.getElementById('categoryBtn').innerText = 'ตา';
            } else if (lang === 'en') {
              document.getElementById('categoryBtn').innerText = 'Eyes';
            } else if (lang === 'cn') {
              document.getElementById('categoryBtn').innerText = '眼睛';
            } else if (lang === 'jap') {
              document.getElementById('categoryBtn').innerText = '目';
            } else if (lang === 'uae') {
              document.getElementById('categoryBtn').innerText = 'عيون';
            }
          } else if (idDisease === '3') {
            if (lang === 'th') {
              document.getElementById('categoryBtn').innerText = 'สมอง';
            } else if (lang === 'en') {
              document.getElementById('categoryBtn').innerText = 'Brain';
            } else if (lang === 'cn') {
              document.getElementById('categoryBtn').innerText = '脑';
            } else if (lang === 'jap') {
              document.getElementById('categoryBtn').innerText = '脳';
            } else if (lang === 'uae') {
              document.getElementById('categoryBtn').innerText = 'دماغ';
            }
          } else if (idDisease === '4') {
            if (lang === 'th') {
              document.getElementById('categoryBtn').innerText = 'ลำคอ';
            } else if (lang === 'en') {
              document.getElementById('categoryBtn').innerText = 'Throat';
            } else if (lang === 'cn') {
              document.getElementById('categoryBtn').innerText = '颈部';
            } else if (lang === 'jap') {
              document.getElementById('categoryBtn').innerText = '首';
            } else if (lang === 'uae') {
              document.getElementById('categoryBtn').innerText = 'عنق';
            }
          } else if (idDisease === '5') {
            if (lang === 'th') {
              document.getElementById('categoryBtn').innerText = 'สูติ';
            } else if (lang === 'en') {
              document.getElementById('categoryBtn').innerText = 'Obstetrics';
            } else if (lang === 'cn') {
              document.getElementById('categoryBtn').innerText = '孕育 ';
            } else if (lang === 'jap') {
              document.getElementById('categoryBtn').innerText = '妊娠';
            } else if (lang === 'uae') {
              document.getElementById('categoryBtn').innerText = 'حمل';
            }
          } else if (idDisease === '6') {
            if (lang === 'th') {
              document.getElementById('categoryBtn').innerText = 'ลำไส้';
            } else if (lang === 'en') {
              document.getElementById('categoryBtn').innerText = 'Intestine';
            } else if (lang === 'cn') {
              document.getElementById('categoryBtn').innerText = '肠道';
            } else if (lang === 'jap') {
              document.getElementById('categoryBtn').innerText = '腸';
            } else if (lang === 'uae') {
              document.getElementById('categoryBtn').innerText = 'أمعاء';
            }
          } else if (idDisease === '7') {
            if (lang === 'th') {
              document.getElementById('categoryBtn').innerText = 'ข้อ';
            } else if (lang === 'en') {
              document.getElementById('categoryBtn').innerText = 'Joint';
            } else if (lang === 'cn') {
              document.getElementById('categoryBtn').innerText = '关节';
            } else if (lang === 'jap') {
              document.getElementById('categoryBtn').innerText = '関節';
            } else if (lang === 'uae') {
              document.getElementById('categoryBtn').innerText = 'مفصل';
            }
          } else if (idDisease === '8') {
            if (lang === 'th') {
              document.getElementById('categoryBtn').innerText = 'ช่องปาก';
            } else if (lang === 'en') {
              document.getElementById('categoryBtn').innerText = 'Mouth';
            } else if (lang === 'cn') {
              document.getElementById('categoryBtn').innerText = '嘴巴 ';
            } else if (lang === 'jap') {
              document.getElementById('categoryBtn').innerText = '口';
            } else if (lang === 'uae') {
              document.getElementById('categoryBtn').innerText = 'فم';
            }
          }
        }
      };
    </script>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <?php
      $selectedCategory = isset($_GET['id_disease']) ? $_GET['id_disease'] : null;
      $lang = isset($_GET['lang']) ? $_GET['lang'] : null;

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
              <img src="uploads/รูปประกอบโรค/<?php echo $row['img']; ?>" class="rounded" style="width: 380px; height: 230px;">
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
  <?php include 'components/footer.php'; ?>
  <!-- Footer -->
  <script src="./assets/js/scroll-top.js"></script>
  <script src="bootstrap-5.3.x/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/lang.js"></script>
</body>

</html>