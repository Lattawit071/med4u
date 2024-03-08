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
          <div class="promotion_case-content">
            <p class="promotion_case" style="text-align: center; color: #062E73;font-size: 32px;font-style: normal;font-weight: 600;line-height: normal;"><?php echo $row['title']; ?></p>
            <div style="text-align: center;">
              <img src="uploads/โปรโมชันโรงพยาบาล/<?php echo $row['img']; ?>" alt="แพ็กเกจตรวจสุขภาพประจำปี" style="width: 779px; height: 800px;">
            </div>
            <div class="information mt-2"  style="display: flex; flex-wrap: wrap;">
              <div class="price" style="display: flex; flex-wrap: wrap; margin-left: 260px;">
                <img src="./uploads/ข้อมูลโรงพยาบาล/price.png" alt="price" style="height: 30px; width: 30px; margin-right: 5px;">
                <p style="color: #062E73; font-size: 20px; font-weight: bold;"><?php echo $row['price']; ?></p>
              </div>
              <div class="time" style="display: flex; flex-wrap: wrap; margin-left: 360px;">
                <img src="./uploads/ข้อมูลโรงพยาบาล/time.png" alt="" style=" width: 30px; height: 30px; margin-right: 5px;">
                <p style="color: #062E73; font-size: 20px; font-weight: bold; margin-right: 5px;">สิ้นสุด</p>
                <p style="color: #062E73; font-size: 20px; font-weight: bold;"><?php echo date('d/m/Y', strtotime($row['date_exp'])); ?></p>
              </div>
            </div>
            <div class="promotion_case-details" style="width: 779px; height: auto; text-align: left; margin-left: 260px;">
              <p class="promotion_case-title"><?php echo $row['description']; ?></p>
            </div>
          </div>
          <div style="display: flex; justify-content: center; align-items: center;">
            <a href="<?php echo $row['link']; ?>">
              <button type="button" class="btn" style="width: 300px; height: 50px; background-color: #062E73; color: #FFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size: 24px; font-style: normal; margin-bottom: 10px; border-radius: 20px;">สอบถามรายละเอียด</button>
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