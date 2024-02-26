<?php
require_once './config/db_conn.inc.php';
require_once './service/action.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MED4U</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo_tag.png" />
  <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/style/component.css">
  <link rel="stylesheet" href="assets/style/style.css">

</head>

<body>
  <!-- include component header -->
  <?php include 'components/header.php'; ?>
  <!-- include component navbar -->
  <?php include 'components/nav.php'; ?>
  <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-inner">
      <?php
      // กำหนด class active สำหรับเรียกรูปมาแสดง
      $i = 0;
      foreach ($carousel as $row) {
        $actives = ($i == 0) ? 'active' : '';
      ?>
        <div class="carousel-item <?php echo $actives; ?>">
          <div class="overlay-image">
            <img src="uploads/Coverphoto/<?php echo $row['img']; ?>" class="d-block w-100 object-fit-cover">
          </div>
        </div>

      <?php
        $i++;
      }
      ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </div>

  <!-- disease -->
  <div class="container-fluid" style="background-image:url('./uploads/disease_logo/disease_bg.png')">
    <div class="p-md-5 text-light justify-content-center align-items-center">
      <h2 class="d-flex justify-content-center mt-1 pt-2" id="disease_title" style="color:#FFFFFF;">โรคน่ารู้</h2>
      <div class="container">
        <div class="row text-align-center">
          <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
            <div class="rounded-element mb-4">
              <a href="disease_information.php?&id_disease=1&lang=<?php echo $lang; ?>">
                <img src="uploads/disease_logo/ผม.jpg" id="img-rounded-drugs">
              </a>
            </div>
            <p class="d-flex flex-wrap fs-4 fw-semibold" id="Skin and hair">ผิวหนังและเส้นผม</p>
          </div>
          <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
            <div class="rounded-element mb-4">
              <a href="disease_information.php?&id_disease=2&lang=<?php echo $lang; ?>">
                <img src="uploads/disease_logo/ตา.jpg" id="img-rounded-drugs">
              </a>
            </div>
            <p class="d-flex flex-wrap fs-4 fw-semibold" id="Eyes">ตา</p>
          </div>
          <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
            <div class="rounded-element mb-4">
              <a href="disease_information.php?&id_disease=3&lang=<?php echo $lang; ?>">
                <img src="uploads/disease_logo/สมอง.jpg" id="img-rounded-drugs">
              </a>
            </div>
            <p class="d-flex flex-wrap fs-4 fw-semibold" id="Brain">สมอง</p>
          </div>
          <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
            <div class="rounded-element mb-4">
              <a href="disease_information.php?&id_disease=4&lang=<?php echo $lang; ?>">
                <img src="uploads/disease_logo/ลำคอ.jpg" id="img-rounded-drugs">
              </a>
            </div>
            <p class="d-flex flex-wrap fs-4 fw-semibold" id="Throat">ลำคอ</p>
          </div>
          <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
            <div class="rounded-element mb-4">
              <a href="disease_information.php?&id_disease=5&lang=<?php echo $lang; ?>">
                <img src="uploads/disease_logo/สูติ.jpg" id="img-rounded-drugs">
              </a>
            </div>
            <p class="d-flex flex-wrap fs-4 fw-semibold" id="Obstetrics">สูติ</p>
          </div>
          <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
            <div class="rounded-element mb-4">
              <a href="disease_information.php?&id_disease=6&lang=<?php echo $lang; ?>">
                <img src="uploads/disease_logo/ลำไส้.jpg" id="img-rounded-drugs">
              </a>
            </div>
            <p class="d-flex flex-wrap fs-4 fw-semibold" id="Intestine">ลำไส้</p>
          </div>
          <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
            <div class="rounded-element mb-4">
              <a href="disease_information.php?&id_disease=7&lang=<?php echo $lang; ?>">
                <img src="uploads/disease_logo/ข้อต่อ.jpg" id="img-rounded-drugs">
              </a>
            </div>
            <p class="d-flex flex-wrap fs-4 fw-semibold" id="Joints">ข้อ</p>
          </div>
          <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
            <div class="rounded-element mb-4">
              <a href="disease_information.php?&id_disease=8&lang=<?php echo $lang; ?>">
                <img src="uploads/disease_logo/ช่องปาก.jpg" id="img-rounded-drugs">
              </a>
            </div>
            <p class="d-flex flex-wrap fs-4 fw-semibold" id="Mouth">ช่องปาก</p>
          </div>
        </div>

      </div>
    </div>
    <div class="container">
      <h2 class="d-flex mt-1 pt-3" id="article_title" style="color:#FFFFFF;">สาระสุขภาพ</h2>
      <div class="card" style="width: 1250px; height: 340px; position: relative;">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators mt-2" style="bottom: 35px; position: absolute; left: 0; right: 0;">
            <?php
            for ($j = 0; $j < min(5, count($article_case)); $j++) {
              $active = ($j == 0) ? 'active' : '';
            ?>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $j; ?>" class="<?php echo $active; ?>" aria-label="Slide <?php echo $j + 1; ?>"></button>
            <?php
            }
            ?>
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
              if ($row['lang'] == $desired_language_id && $i < 5) { 
                $actives = ($i == 0) ? 'active' : '';
            ?>
                <div class="carousel-item <?php echo $actives; ?>">
                  <div class="row">
                    <div class="col-md-7">
                      <img src="uploads/รูปบทความ/<?php echo $row['img']; ?>" class="rounded" style="object-fit: cover; width: 100%; height: 340px;">
                    </div>
                    <div class="col-md-5 d-flex mt-5">
                      <div class="title" style="max-width: 500px;">
                        <h3 class="card-title" style="color: black; text-align: center;"><?php echo $row['title']; ?></h3>
                        <p class="card-title" style="color: black; padding: 8px; text-align: justify; margin-right: 20px;"><?php echo $row['review_description']; ?></p>
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

          <!-- Previous control -->
          <div class="carousel-control-prev" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="width: auto; background: transparent; border: none; font-size: 2rem; margin-left: -50px; margin-top: -50px; position: absolute; top: 50%; transform: translateY(-50%);">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="border-radius: 50%; padding: 20px; color: #fff;"></span>
            <span class="visually-hidden">Previous</span>
          </div>

          <!-- Next control -->
          <div class="carousel-control-next" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" style="width: auto; background: transparent; border: none; font-size: 2rem; margin-right: -50px; margin-top: -50px; position: absolute; top: 50%; transform: translateY(-50%);">
            <span class="carousel-control-next-icon" aria-hidden="true" style="border-radius: 50%; padding: 20px; color: #fff;"></span>
            <span class="visually-hidden">Next</span>
          </div>
        </div>
      </div>


      <div class="d-flex justify-content-between mt-1 pt-2">
        <h2 id="Popular" style="color: #FFFFFF; margin-left: 12px;">ยอดนิยม</h2>
        <a id="All" href="article_information.php?lang=<?php echo $lang ?>" class="btn" style="border-radius: 10px; background: #FFF; text-decoration: none; color: #044374; padding: 8px 16px; margin-right: 50px; position: relative; z-index: 1; pointer-events: auto;">ดูทั้งหมด</a>
      </div>

      <div class="row pt-3">
        <?php
        $selectedLanguage = isset($_GET['lang']) ? $_GET['lang'] : 'th';
        $languageIds = [
          'th' => [31, 26, 9],
          'en' => [151, 132, 152],
        ];
        $targetIds = isset($languageIds[$selectedLanguage]) ? $languageIds[$selectedLanguage] : [];
        foreach ($article_case as $row) {
          if (in_array($row['id'], $targetIds) && $row['lang'] == $selectedLanguage) {
        ?>
            <div class="card m-4 mt-0 position-relative" style="width: 380px; height: 250px; border-radius: 10px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
              <img src="./uploads/รูปบทความ/<?php echo $row['img']; ?>" class="card-img-top" alt="Article Image" style="object-fit: cover; width: 380px; height: 100%; border-radius: 10px;">
              <div class="position-absolute bottom-0 start-0" style="background-color: white; width: 100%; height: 40px;">
                <a href="article_case.php?tag=article_case&title=<?php echo urlencode($row['title']); ?>&tb=article_case&id=<?php echo $row['id']; ?>" style="color: #044374; text-decoration: none; padding-left: 5px; font-weight: 600; margin-top: 10px; display: inline-block;"><?php echo $row['title']; ?></a>
              </div>
            </div>
        <?php
          }
        }
        ?>
      </div>


    </div>
  </div>


  <!-- medicine warning -->
  <div class="container-fluid">
    <div class="p-md-5 text-light justify-content-center align-items-center">
      <h2 class="d-flex justify-content-center mt-1 pt-3" id="warning_title" style="color: #062E73;text-shadow: 0px 4px 4px rgba(255, 255, 255, 0.50);">ข้อควรระวังการใช้ยา</h2>
      <div class="container">
        <div class="row text-alignt-center">
          <?php
          if (isset($_GET['lang'])) {
            $selectedLanguage = $_GET['lang'];
          } else {
            $selectedLanguage = 'th';
          }
          foreach ($medicine_warning as $row) {
            if ($row['lang'] == $selectedLanguage) {
          ?>
              <div class="col-lg-4 mb-2 mt-4 d-flex flex-column justify-content-center align-items-center">
                <div class="medicine mb-4" style="position: relative;">
                  <img src="./uploads/คำเตือนยา/<?php echo $row['img']; ?>" id="medicine-warning-img">
                  <p class="d-flex flex-wrap fw-semibold" style="font-size: 20px; color: black; position: absolute; bottom: 1px; z-index: 1; border-radius: 20px; background: #FFF; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); padding: 5px 10px 5px 10px; color: #044374; width: auto;"><?php echo $row['title']; ?></p>
                </div>
              </div>


          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>


  <!-- clinic -->
  <div class="container-fluid" style="background-color: #0066B2;">
    <div class="p-md-5 text-light justify-content-center align-items-center">
      <h2 class="d-flex justify-content-center mt-1 pt-3" id="clinic_title" style="color:#FFFFFF; ">คลินิก</h2>
      <div class="container">
        <div class="row text-alignt-center">
          <?php
          if (isset($_GET['lang'])) {
            $selectedLanguage = $_GET['lang'];
          } else {
            $selectedLanguage = 'th';
          }
          foreach ($clinic as $row) {
            if ($row['lang'] == $selectedLanguage) {
          ?>
              <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
                <div class="card-square mb-4">
                  <img src="uploads/ภาพคลินิก/<?php echo $row['img']; ?>" id="clinic-img">
                  </a>
                </div>
                <p class="d-flex flex-wrap fs-4 fw-semibold"><?php echo $row['title']; ?></p>
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- hospital -->
  <div class="container">
    <div class="p-md-4 text-light justify-content-center align-items-center">
      <h2 class="d-flex justify-content-center mt-1 pt-2" id="hospital_title" style="color:#0066B2;">โรงพยาบาล</h2>
      <div class="container">
        <div class="row text-align-center" id="hospitalList">
          <?php
          $displayLimit = 12;
          if (isset($_GET['lang'])) {
            $selectedLanguage = $_GET['lang'];
          } else {
            $selectedLanguage = 'th';
          }
          $count = 0;
          foreach ($hospital as $row) {
            if ($row['lang'] == $selectedLanguage && $count < $displayLimit) {
          ?>
              <div class="col-lg-2 mb-4 mt-4 d-flex justify-content-center flex-column justify-content-center align-items-center">
                <div class="rounded-element-hospital mb-4">
                  <img src="uploads/hospitalClinic/<?php echo $row['logo']; ?>" class="rounded-element-hospital-img">
                </div>
                <p class="d-flex flex-wrap text-nowrap fw-300" style="color:black; font-size:20px; text-align: center;"><?php echo $row['name']; ?></p>
              </div>
          <?php
              $count++;
            }
          }
          ?>
        </div>
        <?php if (count($hospital) > $displayLimit) : ?>
          <div class="text-center mt-4">
            <button class="btn btn-outline-primary" id="loadMoreBtn" style="color: black; border-color: #044374; background-color: transparent;" :hover { color: black; border-color: #044374; background-color: transparent; }>ดูเพิ่มเติม</button>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('loadMoreBtn').addEventListener('click', function() {
      var hospitalList = document.getElementById('hospitalList');
      var hiddenHospitals = <?php echo json_encode(array_slice($hospital, $displayLimit)); ?>;
      var existingNames = Array.from(document.querySelectorAll('#hospitalList p')).map(p => p.textContent.trim());
      var existingLogos = Array.from(document.querySelectorAll('#hospitalList img')).map(img => img.getAttribute('src').split('/').pop());

      hiddenHospitals.forEach(function(row) {
        var isNameDuplicate = existingNames.includes(row.name);
        var isLogoDuplicate = existingLogos.includes(row.logo);

        if (row.lang == '<?php echo $selectedLanguage; ?>' && !isNameDuplicate && !isLogoDuplicate) {
          var newHospital = document.createElement('div');
          newHospital.className = 'col-lg-2 mb-4 mt-4 d-flex justify-content-center flex-column justify-content-center align-items-center';
          newHospital.innerHTML = '<div class="rounded-element-hospital mb-4"><img src="uploads/hospitalClinic/' + row.logo + '" id="rounded-element-hospital img"></div><p class="d-flex flex-wrap text-nowrap fw-300" style="color:black; font-size:20px;">' + row.name + '</p>';
          hospitalList.appendChild(newHospital);
        }
      });

      this.style.display = 'none';
    });
  </script>

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