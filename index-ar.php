<?php
require_once 'config/db_conn.inc.php';
require_once 'service/action.php';
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
    <title>หน้าหลัก</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo_tag.png" />
    <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style/component.css">
    <link rel="stylesheet" href="assets/style/style.css">

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
          <a href="?lang=th" onclick="changeLanguage('TH')"><img src="./uploads/lang/thailand.png" alt="Language" class="flag">TH</a>
          <a href="?lang=en&id=$id" onclick="changeLanguage('EN')"><img src="./uploads/lang/english.png" alt="Language" class="flag">EN</a>
          <a href="?lang=cn" onclick="changeLanguage('CN')"><img src="./uploads/lang/china.png" alt="Language" class="flag">CN</a>
          <a href="?lang=jap" onclick="changeLanguage('JAP')"><img src="./uploads/lang/japan.png" alt="Language" class="flag">JAP</a>
          <a href="#" onclick="changeLanguage('ar')"><img src="./uploads/lang/arab.png" alt="Language" class="flag">AR</a>
        </div>
      </div>
    </div>
    <div class="contianer-fluid">
        <div class="nav" id="stick-nav">
            <div class="container py-1 mb-2 mt-2 container-nav">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse justify-content-start" id="multiCollapseExample1">
                            <ul class="navbar-nav">
                            <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_review" href="review?lang=<?php echo $lang?>">مراجعة</a>
                                </li>
                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_promotion" href="promotion?lang=<?php echo $lang?>">مستشيات والعيادات</a>
                                </li>
                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_information" href="article_information?lang=<?php echo $lang?>">المعلومات الصحية</a>
                                </li>
                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_diseases" href="disease_information?lang=<?php echo $lang?>">شائق امراد</a>
                                </li>
                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_home" href="index?lang=<?php echo $lang?>">رئيسية</a>
                                </li>
                            </ul>
                        </div>
                        <a class="navbar-brand" href="index">
                            <img src="assets/images/logo/logo.png" class="brand-logo" alt="logo">
                        </a>

                        <button class="navbar-toggler collapsed" role="button" data-bs-toggle="collapse" href="#multiCollapseExample1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</body>

</html>