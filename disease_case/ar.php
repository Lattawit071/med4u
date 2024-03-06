<?php
require_once '../config/db_conn.inc.php';
require_once '../service/action.php';
$id = $_GET['id'];
$title = urldecode($_GET['title']);
$id_disease = isset($_GET['id_disease']) ? $_GET['id_disease'] : null;
$sql = "SELECT * FROM disease_case";
if (!empty($id_disease)) {
    $sql .= " WHERE id_disease = :id_disease";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
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
                                    <a class="nav-link" id="nav_home" href="../home/ar.php">رئيسية</a>
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
    
    <div class="container">
        <div class="row justify-content-center">
            <?php foreach ($disease_case as $row) {
                $disease_case = $id;
                if ($row['id'] == $disease_case) { ?>
                    <h1 class="disease_case"><?php echo $row['title']; ?></h1>
                    <p class="disease_case-date"><?php echo $row['date_time']; ?></p>
                    <div class="disease_case-content">
                        <img src="../uploads/รูปประกอบโรค/<?php echo $row['img']; ?>" class="d-block w-100 object-fit-cover" loading="lazy">
                        <br>
                        <div class="disease_case-details">
                            <p class="disease_case-title"><?php echo $row['description']; ?></p>
                            <!-- <a href="<?php echo $row['link']; ?>">แหล่งที่มา</a> -->
                        </div>
                    </div>
            <?php }
            } ?>
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