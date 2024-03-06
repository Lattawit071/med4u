<?php
require_once 'config/db_conn.inc.php';
require_once 'service/action.php';
$id = $_GET['id'];
$title = $_GET['title'];
$id_article = isset($_GET['id_article']) ? $_GET['id_article'] : null;

$dbConfig = new DashboardConfig();
$conn = $dbConfig->getConnection();

// ดึงข้อมูลโรคที่มี id ตรงกับที่ระบุใน URL
$sql = "SELECT * FROM article_case WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // เพิ่มจำนวนผู้เข้าชม
    $updatedViews = $result['view'] + 1;
    // อัปเดตจำนวนผู้เข้าชมในตาราง disease_case ที่มี id ตรงกับที่ระบุใน URL
    $updateSql = "UPDATE article_case SET view = :view WHERE id = :id";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bindParam(':view', $updatedViews, PDO::PARAM_INT);
    $updateStmt->bindParam(':id', $id, PDO::PARAM_INT);
    $updateStmt->execute();
} else {
    // ไม่พบข้อมูลที่ตรงกับ id ที่ระบุ
}

$stmt->closeCursor();
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
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
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
                    <a href="index.php?lang=<?php echo $lang ?>" id="breadcrub_home" class="breadcrumbs__link">หน้าหลัก</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="article_information.php?lang=<?php echo $lang ?>" id="breadcrub_article" class="breadcrumbs__link">สาระสุขภาพ</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="" class="breadcrumbs__link"><?php echo $title ?></a>
                </li>
            </ul>
        </div>
    </div>
    <script>
        var lang = '<?php echo $lang; ?>';
        document.getElementById('breadcrub_home').innerText = translations['breadcrub_home'][lang];
        document.getElementById('breadcrub_article').innerText = translations['breadcrub_article'][lang];
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <?php foreach ($article_case as $row) {
                $article_case = $id;
                if ($row['id'] == $article_case) { ?>
                    <h1 class="article_case"><?php echo $row['title']; ?></h1>
                    <div class="display-infor" style="display: flex; flex-wrap: wrap; font-size: 18px;">
                        <p class="article_case-count" id="visit_count" style="margin-right: 5px;"><?php echo $row['view'] ?> จำนวนผู้เข้าชม |</p>
                        <p class="article_case-date"><?php echo date('d/m/Y', strtotime($row['date_time'])); ?></p>
                    </div>
                    <div class="article_case-content">
                        <img src="uploads/รูปบทความ/<?php echo $row['img']; ?>" class="d-block w-100 object-fit-cover">
                        <br>
                        <div class="article_case-details">
                            <p class="article_case-title"><?php echo $row['description']; ?></p>
                        </div>
                    </div>
                    <!-- <div class="d-flex align-items-center">
                        <i class="fa fa-link mr-2" style="font-size: 1.2rem;"></i>
                        <a href="<?php echo $row['link']; ?>" target="_blank" style="text-decoration: none; color: #007bff; font-weight: bold;">
                            แหล่งที่มา
                        </a>
                    </div> -->
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
    <?php include 'components/footer.php'; ?>
    <!-- Footer -->
    <script src="./assets/js/scroll-top.js"></script>
    <script src="bootstrap-5.3.x/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/lang.js"></script>
</body>

</html>