<?php
require_once 'config/db_conn.inc.php';
require_once 'service/action.php';
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
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo_tag.png" />
    <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style/component.css">
    <link rel="stylesheet" href="assets/style/style.css">
</head>

<body>
 <!-- include component header -->
 <header class="header">
    <div class="header-container">
      <a href="<?php echo $nav_header_link; ?>" class="text-light" id="nav_vaccine"><?php echo $nav_header_title; ?></a>
      <div class="dropdown">
        <button class="dropbtn" id="selectedLanguage">
          <img src="./uploads/lang/thailand.png" alt="Language" class="flag">TH
        </button>
        <div class="dropdown-content" id="myDropdown">
          <a href="?lang=th" onclick="changeLanguage('TH')"><img src="./uploads/lang/thailand.png" alt="Language" class="flag">TH</a>
          <a href="?lang=en" onclick="changeLanguage('EN')"><img src="./uploads/lang/english.png" alt="Language" class="flag">EN</a>
          <a href="?lang=cn" onclick="changeLanguage('CN')"><img src="./uploads/lang/china.png" alt="Language" class="flag">CN</a>
          <a href="?lang=jap" onclick="changeLanguage('JAP')"><img src="./uploads/lang/japan.png" alt="Language" class="flag">JAP</a>
          <a href="#" onclick="changeLanguage('ar')"><img src="./uploads/lang/arab.png" alt="Language" class="flag">AR</a>
        </div>
      </div>
    </div>
  </header>


    <!-- include component navbar -->
    <?php include 'components/nav.php'; ?>
    <div class="way" style="width: 1400px; height: 40px; border-radius: 0px 100px 100px 0px; background: #044374; margin-bottom: 5px;">
        <div class="container">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="index.php?lang=<?php echo $lang ?>" class="breadcrumbs__link">หน้าหลัก</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="disease_information.php?lang=<?php echo $lang ?>" class="breadcrumbs__link">โรคน่ารู้</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="" class="breadcrumbs__link"><?php echo $title ?></a>
                </li>
            </ul>
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
                        <img src="uploads/รูปประกอบโรค/<?php echo $row['img']; ?>" class="d-block w-100 object-fit-cover" loading="lazy">
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
    <?php include 'components/footer.php'; ?>
    <!-- Footer -->
    <script src="./assets/js/scroll-top.js"></script>
    <script src="bootstrap-5.3.x/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/lang.js"></script>
</body>

</html>