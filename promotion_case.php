<?php
require_once 'config/db_conn.inc.php';
require_once 'service/action.php';

$id = $_GET['id'];
$id_promotion = isset($_GET['id_promotion']) ? $_GET['id_promotion'] : null;

$sql = "SELECT * FROM promotion_case";
if (!empty($id_promotion)) {
  $sql .= " WHERE id_promotion = :id_promotion";
}

// Assuming you execute the SQL query and fetch the results into $promotion_case array.
// This part is missing in your provided code.
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>โปรโมชัน</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo_tag.png" />
  <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/style/component.css">
  <link rel="stylesheet" href="assets/style/style.css">
  <!-- <link rel="stylesheet" href="assets/font-awesome-4.7.0/fontawesome.min.css"> -->
  <link rel="stylesheet" href="assets/font-awesome-4.7.0/fontawesome.min.css">
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
          <a href="index.php?lang=<?php echo $lang ?>" class="breadcrumbs__link">หน้าหลัก</a>
        </li>
        <li class="breadcrumbs__item">
          <a href="promotion.php?lang=<?php echo $lang ?>" class="breadcrumbs__link">โปรโมชัน</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="container">
  <div class="row justify-content-center">
    <?php foreach ($promotion_case as $row) {
      if ($row['id'] == $id) { ?>
        <div class="promotion_case-content col-12 col-md-10 col-lg-8"> 
          <h2 class="promotion_case text-center mb-4" style="color: #062E73; font-size: 32px; font-weight: 600; line-height: 1.4;">
            <?php echo $row['title']; ?>
          </h2>
          <div class="text-center">
            <img src="uploads/โปรโมชันโรงพยาบาล/<?php echo $row['img']; ?>" alt="แพ็กเกจตรวจสุขภาพประจำปี" class="img-fluid rounded-3 shadow-lg" style="max-width: 100%; height: auto;">
          </div>
          <div class="information mt-4 d-flex flex-wrap justify-content-between">
            <div class="price d-flex align-items-center">
              <img src="./uploads/ข้อมูลโรงพยาบาล/price.png" alt="price" class="me-2" style="height: 30px; width: 30px;">
              <p class="mb-0" style="color: #062E73; font-size: 20px; font-weight: bold;"><?php echo $row['price']; ?></p>
            </div>
            <div class="time d-flex align-items-center mt-2">
              <img src="./uploads/ข้อมูลโรงพยาบาล/time.png" alt="" class="me-2" style="width: 30px; height: 30px;">
              <p class="mb-0" style="color: #062E73; font-size: 20px; font-weight: bold;">สิ้นสุด</p>
              <p class="mb-0" style="color: #062E73; font-size: 20px; font-weight: bold;"><?php echo date('d/m/Y', strtotime($row['date_exp'])); ?></p>
            </div>
          </div>
          <div class="promotion_case-details mt-3">
            <p class="promotion_case-title" style="font-size: 18px; line-height: 1.6 ; color: #333;"><?php echo $row['description']; ?></p>
          </div>
        </div>
        <div class="text-center mt-4">
          <a href="<?php echo $row['link']; ?>">
            <button type="button" class="btn w-100 w-md-auto" style="max-width: 300px; height: 50px; background-color: #062E73; color: #FFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size: 20px; font-weight: bold; border-radius: 25px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); transition: background-color 0.3s;">
              สอบถามรายละเอียด
            </button>
          </a>
        </div>
    <?php }
    } ?>
  </div>
</div>



</body>
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

</html>