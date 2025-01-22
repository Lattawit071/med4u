<?php
require_once '../config/db_conn.inc.php';
require_once '../service/action.php';
session_start();
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
} elseif (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {
    $lang = 'th';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MED4U</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo/logo_tag.png" />
    <link rel="stylesheet" href="../bootstrap-5.3.x/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style/component.css">
    <link rel="stylesheet" href="../assets/style/style.css">

</head>

<body>
    <header class="header">
        <div class="header-container">
            <a href="<?php echo $nav_header_link; ?>" class="text-light" id="nav_vaccine">تطعيم مجاني</a>
            <div class="dropdown">
                <button class="dropbtn" id="selectedLanguage">
                    <img src="../uploads/lang/arab.png" alt="Language" class="flag">AR
                </button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="../index.php?lang=th"><img src="../uploads/lang/thailand.png" alt="Language" class="flag">TH</a>
                    <a href="en.php"><img src="../uploads/lang/english.png" alt="Language" class="flag">EN</a>
                    <a href="en.php"><img src="../uploads/lang/china.png" alt="Language" class="flag">CN</a>
                    <a href="jap.php"><img src="../uploads/lang/japan.png" alt="Language" class="flag">JAP</a>
                    <a href="ar.php"><img src="../uploads/lang/arab.png" alt="Language" class="flag">AR</a>
                </div>
            </div>
        </div>
    </header>
    <div class="contianer-fluid">
        <div class="nav" id="stick-nav">
            <div class="container py-1 mb-2 mt-2 container-nav">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse justify-content-start" id="multiCollapseExample1">
                            <ul class="navbar-nav">
                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_review" href="review?lang=<?php echo $lang ?>">مراجعة</a>
                                </li>
                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_promotion" href="promotion?lang=<?php echo $lang ?>">مستشيات والعيادات</a>
                                </li>
                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_information" href="article_information?lang=<?php echo $lang ?>">المعلومات الصحية</a>
                                </li>
                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_diseases" href="../disease_information/ar.php">شائق امراد</a>
                                </li>
                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_home" href="ar.php">رئيسية</a>
                                </li>
                            </ul>
                        </div>
                        <a class="navbar-brand" href="index">
                            <img src="../assets/images/logo/logo.png" class="brand-logo" alt="logo">
                        </a>

                        <button class="navbar-toggler collapsed" role="button" data-bs-toggle="collapse" href="#multiCollapseExample1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </div>
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
                        <img src="../uploads/Coverphoto/<?php echo $row['img']; ?>" class="d-block w-100 object-fit-cover">
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
    <div class="container-fluid" style="background-image:url('../uploads/disease_logo/disease_bg.png')">
        <div class="p-md-5 text-light justify-content-center align-items-center">
            <h2 class="d-flex justify-content-center mt-1 pt-2" id="disease_title" style="color:#FFFFFF;">شا ئق أمراض</h2>
            <div class="container">
                <div class="row text-align-center">
                    <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="rounded-element mb-4">
                            <a href="disease_information.php?&id_disease=1&lang=<?php echo $lang; ?>">
                                <img src="../uploads/disease_logo/ผม.jpg" id="img-rounded-drugs">
                            </a>
                        </div>
                        <p class="d-flex flex-wrap fs-4 fw-semibold" id="Skin and hair">
                            شعر</p>
                    </div>
                    <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="rounded-element mb-4">
                            <a href="disease_information.php?&id_disease=2&lang=<?php echo $lang; ?>">
                                <img src="../uploads/disease_logo/ตา.jpg" id="img-rounded-drugs">
                            </a>
                        </div>
                        <p class="d-flex flex-wrap fs-4 fw-semibold" id="Eyes">
                            عين</p>
                    </div>
                    <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="rounded-element mb-4">
                            <a href="disease_information.php?&id_disease=3&lang=<?php echo $lang; ?>">
                                <img src="../uploads/disease_logo/สมอง.jpg" id="img-rounded-drugs">
                            </a>
                        </div>
                        <p class="d-flex flex-wrap fs-4 fw-semibold" id="Brain">
                            مخ</p>
                    </div>
                    <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="rounded-element mb-4">
                            <a href="disease_information.php?&id_disease=4&lang=<?php echo $lang; ?>">
                                <img src="../uploads/disease_logo/ลำคอ.jpg" id="img-rounded-drugs">
                            </a>
                        </div>
                        <p class="d-flex flex-wrap fs-4 fw-semibold" id="Throat">
                            حلقوم</p>
                    </div>
                    <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="rounded-element mb-4">
                            <a href="disease_information.php?&id_disease=5&lang=<?php echo $lang; ?>">
                                <img src="../uploads/disease_logo/สูติ.jpg" id="img-rounded-drugs">
                            </a>
                        </div>
                        <p class="d-flex flex-wrap fs-4 fw-semibold" id="Obstetrics">
                            ولادة</p>
                    </div>
                    <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="rounded-element mb-4">
                            <a href="disease_information.php?&id_disease=6&lang=<?php echo $lang; ?>">
                                <img src="../uploads/disease_logo/ลำไส้.jpg" id="img-rounded-drugs">
                            </a>
                        </div>
                        <p class="d-flex flex-wrap fs-4 fw-semibold" id="Intestine">
                            الأمعاء</p>
                    </div>
                    <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="rounded-element mb-4">
                            <a href="disease_information.php?&id_disease=7&lang=<?php echo $lang; ?>">
                                <img src="../uploads/disease_logo/ข้อต่อ.jpg" id="img-rounded-drugs">
                            </a>
                        </div>
                        <p class="d-flex flex-wrap fs-4 fw-semibold" id="Joints">
                            مفاصل</p>
                    </div>
                    <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
                        <div class="rounded-element mb-4">
                            <a href="disease_information.php?&id_disease=8&lang=<?php echo $lang; ?>">
                                <img src="../uploads/disease_logo/ช่องปาก.jpg" id="img-rounded-drugs">
                            </a>
                        </div>
                        <p class="d-flex flex-wrap fs-4 fw-semibold" id="Mouth">
                            جوف الفم</p>
                    </div>
                </div>

            </div>
            <div class="container">
                <h2 class="d-flex mt-1 pt-3" id="article_title" style="color:#FFFFFF;">المعلومات الصحية</h2>
                <div class="card" style="width: 1250px; height: 340px;  position: relative;">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $desired_language_id = 'ar';
                            $i = 0;
                            shuffle($article_case);
                            foreach ($article_case as $row) {
                                if ($row['lang'] == $desired_language_id) {
                                    $actives = ($i == 0) ? 'active' : '';
                            ?>
                                    <div class="carousel-item <?php echo $actives; ?>">
                                        <div class="row">
                                            <div class="col-md-5 d-flex mt-5">
                                                <div class="title" style="max-width: 500px;">
                                                    <h3 class="card-title" style="color: black; text-align: center;"><?php echo $row['title']; ?></h3>
                                                    <p class="card-title" style="color: black; padding: 8px; text-align: justify; margin-right: 20px;"><?php echo $row['review_description']; ?></p>
                                                    <a id="Read more" href="/article_case.php?&tag=article_case&title=<?php echo $row['title']; ?>&tb=article_case&id=<?php echo $row['id']; ?>" style="padding: 10px;">
                                                        قراءة المزيد
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <img src="../uploads/รูปบทความ/<?php echo $row['img']; ?>" class="rounded" style="object-fit: cover; width: 100%; height: 340px; ">
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
                    <h2 id="Popular" style="color: #FFFFFF; margin-left: 12px;">
                        شائع</h2>
                    <a id="All" href="article_information.php?lang=<?php echo $lang ?>" class="btn" style="border-radius: 10px; background: #FFF; text-decoration: none; color: #044374; padding: 8px 16px; margin-right: 50px; position: relative; z-index: 1; pointer-events: auto;">
                        عرض الكل</a>
                </div>


                <div class="row pt-3">
                    <div class="card m-4 mt-0  position-relative" style="display: flex; width: 380px; height: 250px; justify-content: center; align-items: center; border-radius: 10px; overflow: hidden;">
                        <img src="../uploads//รูปบทความ/โรคกระเพาะปัสสาวะอักเสบ.png" class="card-img-top" alt="..." style="object-fit: cover; width: 380px; height: 100%; border-radius: 10px;">
                        <div class="position-absolute bottom-0 start-0" style="background-color: white;width: 100%;height: 40px;">
                            <a href="#" style="color: #044374; text-decoration: none; padding-left: 5px; font-weight: 600; margin-top: 10px; display: inline-block;">
                                فهم التهاب المسالك البولية</a>
                        </div>
                    </div>

                    <div class="card m-4 mt-0 position-relative" style="display: flex; width: 380px; height: 250px; justify-content: center; align-items: center; overflow: hidden; border-radius: 10px;">
                        <img src="../uploads//รูปบทความ/อ่อนเพลีย.png" class="card-img-top" alt="..." style="object-fit: cover; width: 380px; height: 100%; border-radius: 10px;">
                        <div class="position-absolute bottom-0 start-0" style="background-color: white; width: 100%;height: 40px;">
                            <a href="#" style="color: #044374; text-decoration: none; padding-left: 5px; font-weight: 600; margin-top: 10px; display: inline-block;">
                                قد يكون الضعف والتشوش العقلي بسبب السموم والمعادن الثقيلة</a>
                        </div>
                    </div>

                    <div class="card m-4 mt-0 position-relative" style="display: flex; width: 380px; height: 250px; justify-content: center; align-items: center; border-radius: 10px; overflow: hidden;">
                        <img src="../uploads//รูปบทความ/ต้องระวัง 5 โรคติดต่อในเพศสัมพันธ์.png" class="card-img-top" alt="..." style="object-fit: cover; width: 380px; height: 100%; border-radius: 10px;">
                        <div class="position-absolute bottom-0 start-0" style="background-color: white; width: 100%; height: 40px;">
                            <a href="#" style="color: #044374; text-decoration: none; padding-left: 5px; font-weight: 600; margin-top: 10px; display: inline-block;">
                                تحذير من 5 الأمراض المنقولة جنسياً</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- medicine warning -->
    <div class="container-fluid">
        <div class="p-md-5 text-light justify-content-center align-items-center">
            <h2 class="d-flex justify-content-center mt-1 pt-3" id="warning_title" style="color: #062E73;text-shadow: 0px 4px 4px rgba(255, 255, 255, 0.50);">
                احتياطات استخدام الدواء</h2>
            <div class="container">
                <div class="row text-alignt-center">
                    <?php
                    $desired_language_id = 'ar';
                    foreach ($medicine_warning as $row) {
                        if ($row['lang'] == $desired_language_id) {
                    ?>
                            <div class="col-lg-4 mb-2 mt-4 d-flex flex-column justify-content-center align-items-center">
                                <div class="medicine mb-4" style="position: relative;">
                                    <img src="../uploads/คำเตือนยา/<?php echo $row['img']; ?>" id="medicine-warning-img">
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
            <h2 class="d-flex justify-content-center mt-1 pt-3" id="clinic_title" style="color:#FFFFFF; ">
                العيادات</h2>
            <div class="container">
                <div class="row text-alignt-center">
                    <?php
                    $desired_language_id = 'ar';
                    foreach ($clinic as $row) {
                        if ($row['lang'] == $desired_language_id) {
                    ?>
                            <div class="col-lg-3 mb-5 mt-4 d-flex flex-column justify-content-center align-items-center">
                                <div class="card-square mb-4">
                                    <img src="../uploads/ภาพคลินิก/<?php echo $row['img']; ?>" id="clinic-img">
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
            <h2 class="d-flex justify-content-center mt-1 pt-2" id="hospital_title" style="color:#0066B2;">
                مستشفيات</h2>
            <div class="container">
                <div class="row text-align-center" id="hospitalList">
                    <?php
                    $displayLimit = 12;
                    $selectedLanguage = 'ar';
                    echo $selectedLanguage;
                    $count = 0;
                    foreach ($hospital as $row) {
                        if ($row['lang'] == $selectedLanguage && $count < $displayLimit) {
                    ?>
                            <div class="col-lg-2 mb-4 mt-4 d-flex justify-content-center flex-column justify-content-center align-items-center">
                                <div class="rounded-element-hospital mb-4">
                                    <img src="../uploads/hospitalClinic/<?php echo $row['logo']; ?>" class="rounded-element-hospital-img">
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
                        <button class="btn btn-outline-primary" id="loadMoreBtn" style="color: black; border-color: #044374; background-color: transparent;" :hover { color: black; border-color: #044374; background-color: transparent; }>
                            تعلم المزيد</button>
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
                    newHospital.innerHTML = '<div class="rounded-element-hospital mb-4"><img src="../uploads/hospitalClinic/' + row.logo + '" id="rounded-element-hospital img"></div><p class="d-flex flex-wrap text-nowrap fw-300" style="color:black; font-size:20px;">' + row.name + '</p>';
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
    <script src="./assets/js/scroll-top.js"></script>
    <script src="./bootstrap-5.3.x/js/bootstrap.bundle.min.js"></script>
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
                                <a href="#">
                                    سياسة الخصوصية </a>|
                                <a href="#">Cookies Policy </a>|
                                <a href="#">
                                    شروط الخدمة</a>
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

</body>

</html>