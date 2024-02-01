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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MED4U</title>
</head>
<body>
    <div class="contianer">
        <div class="nav" id="stick-nav">
            <div class="container py-1 mb-2 mt-2 container-nav">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index">
                            <img src="assets/images/logo/logo.png" class="brand-logo" alt="logo">
                        </a>

                        <button class="navbar-toggler collapsed" role="button" data-bs-toggle="collapse" href="#multiCollapseExample1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-end" id="multiCollapseExample1">
                            <ul class="navbar-nav">
                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_home" href="index?lang=<?php echo $lang?>">หน้าหลัก</a>
                                </li>
                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_diseases" href="disease_information?lang=<?php echo $lang?>">โรคน่ารู้</a>
                                </li>

                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_information" href="article_information?lang=<?php echo $lang?>">สาระสุขภาพ</a>
                                </li>

                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_promotion" href="promotion?lang=<?php echo $lang?>">โปรโมชัน</a>
                                </li>
                                <li class="nav-item hover-underline-animation">
                                    <a class="nav-link" id="nav_review" href="review?lang=<?php echo $lang?>">รีวิวสินค้า</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</body>
</html>