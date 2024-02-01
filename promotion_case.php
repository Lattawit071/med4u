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
  
  <div class="way" style="width: 1400px; height: 40px; border-radius: 0px 100px 100px 0px; background: #044374; margin-bottom: 10px;">
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
                    <div class="div">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="30" height="30" style="fill: #062E73; margin-right: 2px;">
                            <path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                        </svg>
                        <?php echo $row['date_exp']; ?>
                    </div>


                    <div class="promotion_case-content">
                        <p class="promotion_case" style="text-align: center; color: #062E73;font-size: 32px;font-style: normal;font-weight: 600;line-height: normal;"><?php echo $row['title']; ?></p>
                        <img src="uploads/โปรโมชัน/<?php echo $row['img']; ?>" class="d-block w-100 object-fit-cover" alt="Promotion Image">
                        <br>
                        <div class="promotion_case-details">
                            <p class="promotion_case-title"><?php echo $row['description']; ?></p>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <a href="<?php echo $row['link']; ?>">
                            <button type="button" class="btn" style="width: 300px; height: 50px; background-color: #062E73; color: #FFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size: 24px; font-style: normal; margin-bottom: 10px;">สอบถามรายละเอียด</button>
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
    <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/></svg>
  </div>
  <!-- Footer -->
  <?php include 'components/footer.php'; ?>
  <!-- Footer -->
  <script src="./assets/js/scroll-top.js"></script>
  <script src="bootstrap-5.3.x/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/lang.js"></script>
</html>