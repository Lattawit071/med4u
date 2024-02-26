<?php
require_once 'config/db_conn.inc.php';
require_once 'service/action.php';

$name = $_GET['name'];
$hospital_id = $_GET['hospital_id'];

$dbConfig = new DashboardConfig();
$conn = $dbConfig->getConnection();

// Fetch images_hospital data
$stmt = $conn->prepare("SELECT * FROM images_hospital WHERE hospital_id = :hospital_id");
$stmt->bindParam(':hospital_id', $hospital_id);
$stmt->execute();
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch hospital_case data
$stmt = $conn->prepare("SELECT * FROM hospital_case WHERE name = :name");
$stmt->bindParam(':name', $name);
$stmt->execute();
$hospital_cases = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch image_small_hospital data
$stmt = $conn->prepare("SELECT * FROM image_small_hospital WHERE hospital_id = :hospital_id");
$stmt->bindParam(':hospital_id', $hospital_id);
$stmt->execute();
$images_small = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $name ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo_tag.png" />
    <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style/component.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/fontawesome.min.css">
    <style>
        .carousel-control-prev2 {
            color: #fff;
            height: 40px;
            width: 40px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            margin-left: -20px;
            /* เพิ่ม margin-left ที่ไม่มีใน .carousel-control-prev2 */
        }

        .carousel-control-next2 {
            color: #fff;
            height: 40px;
            width: 40px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            margin-right: 40px;
        }

        .carousel-control-prev2::before {
            content: '❮';
            color: #fff;
            font-size: 30px;
        }

        .carousel-control-next2::before {
            content: '❯';
            color: #fff;
            font-size: 30px;
        }
    </style>

</head>

<body>

    <?php include 'components/header.php'; ?>
    <?php include 'components/nav.php'; ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
        <div class="carousel-inner" style="width: 100%; height: 500px;">
            <?php foreach ($images as $i => $row) : ?>
                <div class="carousel-item <?= ($i == 0) ? 'active' : '' ?>">
                    <img src="uploads/ภาพปกโรงพยาบาล/<?= $row['img'] ?>" style="width: 100%; height: 500px;">
                </div>
            <?php endforeach; ?>
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

    <div class="container mt-5 mb-5">
        <?php foreach ($hospital_cases as $row) : ?>
            <div class="row">
                <div class="col-6">
                    <div id="carouselExampleIndicators_small" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                        <div class="carousel-inner" style="width: 600px; height: 550px;">
                            <?php foreach ($images_small as $i => $small_row) : ?>
                                <div class="carousel-item <?= ($i == 0) ? 'active' : '' ?>">
                                    <img src="uploads/ภาพสไลด์เล็กโรงพยาบาล/<?= $small_row['img'] ?>" style="width: 100%; height: 550px;">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators_small" data-bs-slide="prev">
                            <span class="carousel-control-prev2" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators_small" data-bs-slide="next">
                            <span class="carousel-control-next2" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-6">
                    <?php if (isset($row['logo'])) : ?>
                        <img src="uploads/ข้อมูลโรงพยาบาล/<?= $row['logo'] ?>" style="width: auto; height: 90px;">
                    <?php else : ?>
                        <p>No logo available for this hospital.</p>
                    <?php endif; ?>
                    <p class="review_hospital" style="margin-top: 20px; color: #062E73; text-align: justify;"><?= $row['review_hospital'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if (empty($hospital_cases)) : ?>
            <p>No hospital found for the given name.</p>
        <?php endif; ?>
    </div>

    <div class="container-fluid" style="background-image:url('./uploads/ข้อมูลโรงพยาบาล/bg_hospital_case.png'); background-size: cover; background-position: center; padding: 20px; text-align: justify;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="hospital_case-location" style="color: white; padding: 10px 0; margin: 0; display: flex; align-items: center; font-weight:bold; font-size: 20px;">
                        <img src="./uploads/ข้อมูลโรงพยาบาล/location.png" style="width: 48px; height: 60px; margin-right: 10px;">
                        <?php echo $row['location']; ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <p class="hospital_case-phone" style="color: white; padding: 10px 0; margin: 0; display: flex; align-items: center; font-weight:bold; font-size: 20px;">
                        <img src="./uploads/ข้อมูลโรงพยาบาล/phone.png" style="width: 65px; height: 65px; margin-right: 10px; margin-left: 150px;">
                        <?php echo $row['phone']; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <h2 class="d-flex mt-5 pt-2 mb-3" style="color: #062E73;">เด่นด้านการรักษา</h2>

        <div class="column" style="text-align: center; display: flex;">
            <?php if (!empty($row['img_treatment_1'])) : ?>
                <div class="img_treatment_1" style="position: relative; margin-right: 20px;">
                    <img src="./uploads/ข้อมูลโรงพยาบาล/<?php echo $row['img_treatment_1']; ?>" style="width: 150px; height: 130px;">
                    <div class="position-absolute bottom-0 start-0" style="width: 100%; height: 40px; position: absolute; bottom: 0;">
                        <p style="color: white; font-size: 18px;"><?php echo $row['treatment_1']; ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($row['img_treatment_2'])) : ?>
                <div class="img_treatment_2" style="position: relative; margin-right: 20px;">
                    <img src="./uploads/ข้อมูลโรงพยาบาล/<?php echo $row['img_treatment_2']; ?>" style="width: 150px; height: 130px;">
                    <div class="position-absolute bottom-0 start-0" style="width: 100%; height: 40px; position: absolute; bottom: 0;">
                        <p style="color: white; font-size: 18px;"><?php echo $row['treatment_2']; ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($row['img_treatment_3'])) : ?>
                <div class="img_treatment_3" style="position: relative; margin-right: 20px;">
                    <img src="./uploads/ข้อมูลโรงพยาบาล/<?php echo $row['img_treatment_3']; ?>" style="width: 150px; height: 130px;">
                    <div class="position-absolute bottom-0 start-0" style="width: 100%; height: 40px; position: absolute; bottom: 0;">
                        <p style="color: white; font-size: 18px;"><?php echo $row['treatment_3']; ?></p>
                    </div>
                </div>
            <?php endif; ?>

        </div>


        <h3 class="d-flex justify-content-center mt-1 pt-2" style="color: #062E73;">แพ็กเกจและโปรโมชั่น</h3>
    </div>
    <script src="./assets/js/scroll-top.js"></script>
    <script src="bootstrap-5.3.x/js/bootstrap.bundle.min.js"></script>
</body>

</html>