<?php
require_once './config/db_conn.inc.php';
require_once 'service/action.php';
$id_review = isset($_GET['id_review']) ? $_GET['id_review'] : null;
$sql = "SELECT * FROM review_case";
if (!empty($id_review)) {
    $sql .= "WHERE id_review = :id_review";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รีวิวสินค้า</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo_tag.png" />
    <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style/component.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="./assets/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
<style>
  .checked {
            color: #FFD600;
        }
</style>

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
    <div class="container">
        <?php foreach ($review_case as $row) {
            $review_case = $id;
            if ($row['id'] == $review_case) { ?>
                <div class="row m-5 mt-2">
                    <div class="col-5">
                        <img src="./uploads/รีวิว/<?php echo $row['img'];?>" alt="" style="width: 380px; height: 300px;">
                    </div>
                    <div class="col-7">
                        <h3><?php echo $row['product_name']; ?></h3>
                        <div class="column">
                            <div class="col-4">
                            <?php if ($row['rating'] == 5) : ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span> <?php echo $row['rating']; ?>
                            <?php elseif ($row['rating'] >= 4) : ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star-o"></span> <?php echo $row['rating']; ?>
                            <?php elseif ($row['rating'] >= 3) : ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span> <?php echo $row['rating']; ?>
                            <?php elseif ($row['rating'] >= 2) : ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span> <?php echo $row['rating']; ?>
                            <?php elseif ($row['rating'] >= 1) : ?>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span>
                                <span class="fa fa-star-o"></span> <?php echo $row['rating']; ?>
                            <?php endif; ?>
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                        <h5>สั่งซื้อได้ทาง</h5>
                        <div class="pic_shop m-2">
                            <a href="https://shopee.co.th/" target="_blank"><img src="uploads/รีวิว/shoppee.png" alt="" width="40px"></a>
                            <a href="#" target="_blank"><img src="uploads/รีวิว/lazada.png" alt="" width="40px"></a>
                            <a href="#" target="_blank"><img src="uploads/รีวิว/7-11.png" alt="" width="40px"></a>
                            <a href="#" target="_blank"><img src="uploads/รีวิว/watsans.png" alt="" width="40px"></a>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
        <h3>รายละเอียดสินค้า</h3>
        <p>Micellar Cleansing Water</p>
        <p>เหมาะสำหรับ ทุกสภาพผิว แม้ผิวแพ้ง่าย</p>
        <p>ปริมาณ 125 / 400 ml. ราคา 99 / 249 บาท</p>
        <p>จุดเด่น ช่วยดึงเครื่องสำอางแม้เครื่องสำอางกันน้ำสิ่งสกปรกและความมันออกจากผิวหน้าได้อย่างหมดจดและอ่อนโยนแม้บริเวณรอบดวงตา และปาก</p>
    </div>
</body>

</html> <!-- <div class="col-4 mt-2">
                <div class="progress" style="height:30px; border-radius: 20px;">
                    <div class="progress-bar" style="width:60%; border-radius: 20px; background-color: #044374;">60%</div>
                </div><br>

                <div class="progress" style="height:30px; border-radius: 20px;">
                    <div class="progress-bar" style="width:70%; border-radius: 20px; background-color: #044374;">70%</div>
                </div><br>
                <div class="progress" style="height:30px; border-radius: 20px;">
                    <div class="progress-bar" style="width:90%; border-radius: 20px; background-color: #044374;">90%</div>
                </div>
            </div>