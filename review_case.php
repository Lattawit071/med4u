<?php
require_once 'config/db_conn.inc.php';
require_once 'service/action.php';
$id = $_GET['id'];
$title = $_GET['title'];
$id_review = isset($_GET['id_review']) ? $_GET['id_review'] : null;
$sql = "SELECT * FROM review_case";
if (!empty($id_review)) {
    $sql .= " WHERE id_review = :id_review";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo_tag.png" />
    <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style/component.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="./assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <style>
        .compare {
        display: flex;
        align-items: center;
        }
        .compare p {
            margin: 0; 
        }
        .checked {
            color: #FFD600;
        }

        .checked {
            color: #FFD600;
        }

        .box {
            flex-shrink: 0;
            border-radius: 5px;
            background: #EEE;
        }

        .left-rectangle {
            width: 400px;
            height: 90px;
        }

        .center-rectangle {
            width: 400px;
            height: 200px;
        }

        .right-rectangle {
            width: 400px;
            height: 90px;
        }
    </style>
</head>

<body>
 <!-- include component header -->
 <?php include 'components/header.php'; ?>


    <!-- include component navbar -->
    <?php include 'components/nav.php'; ?>
    <div class="way" style="border-radius: 0px 100px 100px 0px; background: #044374;">
    <div class="container">
     <ul class="breadcrumbs">
      <li class="breadcrumbs__item">
        <a href="index.php?lang=<?php echo $lang?>" class="breadcrumbs__link">หน้าหลัก</a>
      </li>
      <li class="breadcrumbs__item">
        <a href="review.php?lang=<?php echo $lang?>" class="breadcrumbs__link">รีวิวสินค้า</a>
      </li>
      <li class="breadcrumbs__item">
        <a href="#" class="breadcrumbs__link"><?php echo $title ?></a>
      </li>
     </ul>
    </div>
  </div>

    <div class="container">
        <div class="row justify-content-center">
            <?php foreach ($review_case as $row) {
                $review_case = $id;
                if ($row['id'] == $review_case) { ?>
                    <div class="row m-5 mt-2">
                        <div class="col-5">
                            <img src="uploads/รีวิว/<?php echo $row['img']; ?>" style="width: 400px;height: 350px; margin-left: 50px;">
                        </div>
                        <div class="col-7">
                            <p class="review_case" style="color: #000;font-size: 24px;font-style: normal;font-weight: 500;line-height: normal;"><?php echo $row['product_name']; ?></p>
                            <div class="column" style="text-align: center; display: flex;">
                                <div class="col-4" style="border-right: 1px solid #000;">
                                    <?php if ($row['rating'] == 5) : ?>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <p style="color: #000;font-size: 24px;font-style: normal;font-weight: 500;line-height: normal;"><?php echo $row['rating']; ?></p>
                                    <?php elseif ($row['rating'] >= 4) : ?>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star-o" style="font-size: 25px;"></span>
                                        <p style="color: #000;font-size: 24px;font-style: normal;font-weight: 500;line-height: normal;"><?php echo $row['rating']; ?></p>
                                    <?php elseif ($row['rating'] >= 3) : ?>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star-o" style="font-size: 25px;"></span>
                                        <span class="fa fa-star-o" style="font-size: 25px;"></span>
                                        <p style="color: #000;font-size: 24px;font-style: normal;font-weight: 500;line-height: normal;"><?php echo $row['rating']; ?></p>
                                    <?php elseif ($row['rating'] >= 2) : ?>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star-o" style="font-size: 25px;"></span>
                                        <span class="fa fa-star-o" style="font-size: 25px;"></span>
                                        <span class="fa fa-star-o" style="font-size: 25px;"></span>
                                        <p style="color: #000;font-size: 24px;font-style: normal;font-weight: 500;line-height: normal;"><?php echo $row['rating']; ?></p>
                                    <?php elseif ($row['rating'] >= 1) : ?>
                                        <span class="fa fa-star checked" style="font-size: 25px;"></span>
                                        <span class="fa fa-star-o" style="font-size: 25px;"></span>
                                        <span class="fa fa-star-o" style="font-size: 25px;"></span>
                                        <span class="fa fa-star-o" style="font-size: 25px;"></span>
                                        <span class="fa fa-star-o" style="font-size: 25px;"></span>
                                        <p style="color: #000;font-size: 24px;font-style: normal;font-weight: 500;line-height: normal;"><?php echo $row['rating']; ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-3">
                                    <br>
                                    <p style="color: #000;font-size: 24px;font-style: normal;font-weight: 500;line-height: normal;">5 รีวิว</p>
                                </div>
                            </div>
                            <div class="review_case-content">
                                <br>
                                <p style="color: #000;font-size: 24px;font-style: normal;line-height: normal;">สั่งซื้อได้ทาง</p>
                                 <a href="#"><img src="./uploads/รีวิว/shoppee.png" alt="" style="width: 50px; height: 50px; margin-right: 20px;"></a>
                                <img src="./uploads/รีวิว/lazada.png" alt="" style="width: 50px; height: 50px; margin-right: 20px;">
                                <img src="./uploads/รีวิว/7-11.png" alt="" style="width: 50px; height: 50px; margin-right: 20px;">
                                <img src="./uploads/รีวิว/konvy.png" alt="" style="width: 50px; height: 50px; margin-right: 20px;">
                                <img src="./uploads/รีวิว/watsans.png" alt="" style="width: 50px; height: 50px; margin-right: 20px;">
                            </div>

                        </div>
                        <div class="review_case-content">
                        <div class="compare">
                            <p style="color: #044374; font-size: 32px; font-style: normal; font-weight: 500; line-height: normal; margin-right: 10px;">คุณสมบัติ</p>
                            <a href="compare.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none">
                                <path d="M8.35647 10.5927H1.19208C0.536435 10.5927 0 11.1291 0 11.7847C0 12.4404 0.536435 12.9768 1.19208 12.9768H8.35647V15.1106C8.35647 15.6471 9.00019 15.9093 9.36973 15.5279L12.6837 12.202C12.9102 11.9635 12.9102 11.594 12.6837 11.3556L9.36973 8.02968C9.00019 7.64822 8.35647 7.9224 8.35647 8.44691V10.5927ZM15.4851 7.95816V5.82434H22.6495C23.3051 5.82434 23.8416 5.2879 23.8416 4.63226C23.8416 3.97662 23.3051 3.44018 22.6495 3.44018H15.4851V1.30636C15.4851 0.769929 14.8414 0.507672 14.4718 0.889137L11.1578 4.21503C10.9314 4.45345 10.9314 4.82299 11.1578 5.06141L14.4718 8.38731C14.8414 8.75685 15.4851 8.49459 15.4851 7.95816Z" fill="#062E73"/>
                            </svg>  
                            </a>
                        </div>
                            <div class="container" style="display: flex; justify-content: space-between;">
                                <div class="row">
                                    <div class="box left-rectangle" style="padding-top: 5px; margin-right: 20px;">
                                        <div style="text-align: center; color: #062E73; font-size: 24px; font-style: normal; font-weight: 700; line-height: normal;">เหมาะสำหรับ</div>
                                        <div style="color: #000;font-size: 18px; text-align: center; padding-top: 5px;"><?php echo $row['suitable']; ?></div>
                                    </div>
                                    <div class="box left-rectangle" style="padding-top: 5px; margin-right: 20px;">
                                        <div style="text-align: center; color: #062E73; font-size: 24px; font-style: normal; font-weight: 700; line-height: normal;">ข้อดี</div>
                                        <div style="color: #000;font-size: 18px; text-align: center; padding-top: 5px;"><?php echo $row['strength']; ?></div>
                                    </div>
                                </div>
                                <div class="box center-rectangle" style="padding-top: 5px; margin-bottom: 20px; margin-right: 20px;">
                                    <div style="text-align: center; color: #062E73; font-size: 24px; font-style: normal; font-weight: 700; line-height: normal;">จุดเด่น</div>
                                    <div style="text-align: justify; color: #000;font-size: 18px; padding-top: 8px; padding-left: 10px; padding-right: 10px;"><?php echo $row['prominent_point']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="box right-rectangle" style="padding-top: 5px; margin-left: 20px;">
                                    <div style="text-align: center; color: #062E73; font-size: 24px; font-style: normal; font-weight: 700; line-height: normal;">ปริมาณ</div>
                                    <div style="color: #000;font-size: 18px; text-align: center; padding-top: 5px;"><?php echo $row['quantity']; ?></div>
                                </div>
                                <div class="box right-rectangle" style="padding-top: 5px; margin-left: 20px;">
                                    <div style="text-align: center; color: #062E73; font-size: 24px; font-style: normal; font-weight: 700; line-height: normal;">ราคา</div>
                                    <div style="color: #000;font-size: 18px; text-align: center; padding-top: 5px;"><?php echo $row['price']; ?></div>
                                </div>
                                </div>
                            </div>

                                            
                            <?php echo '<iframe src="' . $row['vdo'] . '" width="1255" height="661" frameborder="0" allowfullscreen></iframe>'; ?>
                            <p style="color: #044374; font-size: 32px; font-style: normal; font-weight: 500; line-height: normal;">รายละเอียด</p>
                            <?php echo $row['details']; ?></p>
                        </div>
                        <div style="text-align: center; display: flex; align-items: center; justify-content: center;">
                            <hr style="flex: 1; border: none; border-top: 2px solid #000; margin: 0 10px;">
                            <p style="color: #000; font-size: 40px; font-style: normal; font-weight: 400; line-height: normal; margin: 0;">Comment</p>
                            <hr style="flex: 1; border: none; border-top: 2px solid #000; margin: 0 10px;">
                        </div>


                    </div>
        </div>
<?php }
            } ?>
    </div>
    <div class="container-fluid" style="background-image:url('./uploads/disease_logo/disease_bg.png')">
        <div class="p-md-5 text-light justify-content-center align-items-center">
            <div class="container">
                <h2 class="d-flex justify-content-center pt-2" id="" style="color:#FFFFFF;">ผลิตภัณฑ์แนะนำ</h2>
                <div class="d-flex flex-wrap justify-content-center">
                    <?php
                    $dashboardConfigInstance = new dashboardConfig();
                    $connection = $dashboardConfigInstance->getConnection();
                    $query = "SELECT * FROM review_case WHERE rating >= 4.9 ORDER BY RAND() LIMIT 4";
                    $statement = $connection->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

                    if ($result) {
                        foreach ($result as $row) {
                    ?>
                            <div class="card rounded-element-disease_case mx-2" style="width: 300px;">
                                <div class="card-body">
                                    <a href="review_case.php?&tag=review_case&title=<?php echo $row['product_name']; ?>&tb=review_case&id=<?php echo $row['id']; ?>">
                                        <img src="uploads/รีวิว/<?php echo $row['img']; ?>" class="rounded w-100" style="object-fit: cover; width: 250px;height: 280px;">
                                    </a>
                                    <div class="card-title">
                                        <br>
                                        <p class="card-title" style="color: black;"><?php echo $row['product_name']; ?></p>
                                        <?php
                                        $rating = $row['rating'];
                                        for ($i = 1; $i <= 5; $i++) {
                                            $checked = ($i <= $rating) ? 'checked' : 'unchecked';
                                            echo "<span class='fa fa-star $checked'></span>";
                                        }
                                        ?>
                                        <?php echo $row['rating']; ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No products found with a rating greater than 4.9.";
                    }
                    ?>
                </div>
            </div>
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