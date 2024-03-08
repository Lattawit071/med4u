<?php
require_once './config/db_conn.inc.php';
require_once 'service/action.php';
$category_id  = isset($_GET['category_id']) ? $_GET['category_id'] : null;
$sql = "SELECT * FROM review_";
if (!empty($category_id)) {
    $sql .= " WHERE category_id = :category_id";
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
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <style>
        .checked {
            color: #FFD600;
        }

        .btn:focus,
        .btn.focus {
            background-color: #044374 !important;
            color: #ffffff !important;
        }

        .product-btn {
            border-radius: 20px;
            background: #EAEAEA;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            width: 180px;
            height: 40px;
        }

        .hover-click-button {
            cursor: pointer;
        }
    </style>
</head>

<body>
     <!-- include component header -->
  <?php include 'components/header.php'; ?>
    <!-- include component navbar -->
    <?php include 'components/nav.php'; ?>

    <div class="way" style="background: #044374;">
    <div class="container">
     <ul class="breadcrumbs">
      <li class="breadcrumbs__item">
        <a href="index?lang=<?php echo $lang?>" class="breadcrumbs__link">หน้าหลัก</a>
      </li>
      <li class="breadcrumbs__item">
        <a href="review?lang=<?php echo $lang?>" class="breadcrumbs__link">รีวิวสินค้า</a>
      </li>
     </ul>
    </div>
  </div>

    <img src="uploads/รีวิว/bg_review.png" style="height: 500px; width: 100%;" alt="">
    <h2 style="color: #044374; text-align: center; margin-top: 10px;">รีวิวเครื่องสำอาง สกินแคร์</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-center align-items-center m-3">
                <a href="?category_id=1&lang=<?php echo $lang; ?>" class="btn mx-2 product-btn" id="cleansingBtn">Cleansing product</a>
                <a href="?category_id=2&lang=<?php echo $lang; ?>" class="btn mx-2 product-btn" id="skinCareBtn">Skin care</a>
                <a href="?category_id=3&lang=<?php echo $lang; ?>" class="btn mx-2 product-btn" id="makeupBtn">Makeup</a>
            </div>
            <?php
            $selectedCategory = isset($_GET['category_id']) ? $_GET['category_id'] : null;
            $language_id = isset($_GET['language_id']) ? $_GET['language_id'] : null;

            $filteredCases = array_filter($review, function ($case) use ($selectedCategory, $language_id) {
                return ($selectedCategory === null || $case['category_id'] == $selectedCategory) &&
                    ($language_id === null || $case['language_id'] == $language_id);
            });
            usort($filteredCases, function ($a, $b) {
                return $b['id'] - $a['id'];
            });
            $itemsPerPage = 12;
            $totalItems = count($filteredCases);
            $totalPages = ceil($totalItems / $itemsPerPage);
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $startIndex = ($currentPage - 1) * $itemsPerPage;
            $endIndex = min($startIndex + $itemsPerPage, $totalItems);
            foreach (array_slice($filteredCases, $startIndex, $itemsPerPage) as $row) {
            ?>
                <div class="card rounded-element-disease_case" style="width: 300px;">
                    <div class="card-body">
                        <a href="review_case?&tag=review_case&title=<?php echo $row['product_name']; ?>&tb=review_case&id=<?php echo $row['id']; ?>">
                            <img src="uploads/รีวิว/<?php echo $row['img']; ?>" class="rounded w-100" style="object-fit: cover; width: 250px;height: 270px;">
                        </a>
                        <div class="card-title">
                            <br>
                            <p class="card-title" style="color: black;"><?php echo $row['product_name']; ?></p>
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
                                    <a href="review_case?&tag=review_case&title=<?php echo $row['product_name']; ?>&tb=review_case&id=<?php echo $row['id']; ?>">
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