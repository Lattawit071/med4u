<?php
require_once 'config/db_conn.inc.php';
require_once 'service/action.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MED4U</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/logo_tag.png" />
  <link rel="stylesheet" href="bootstrap-5.3.x/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/style/component.css">
  <link rel="stylesheet" href="assets/style/style.css">

</head>

<body>
 <!-- include component header -->
 <?php include 'components/header.php'; ?>


  <!-- include component navbar -->
  <?php include 'components/nav.php'; ?>
  <div class="container">
    <div class="bg" style="width: 100%; max-width: 1300px; height: 759px; border-radius: 20px; background: #F4F4F4; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); overflow: auto; overflow-x: auto; overflow-y: hidden;">
        <table style="width: 623%;">
            <tr>
                <th style="width: 280px; height: 120px; background-color: #062E73; color: #fff; border-radius: 5px; font-size: 32px; font-weight: 700; text-align: center;">จุดเด่น</th>
                <?php
                foreach ($review_case as $row) {
                    echo '<td>' . $row['prominent_point'] . '</td>';
                }
                ?>
            </tr>
            <tr>
                <th style="width: 280px; height: 50px; background-color: #062E73; color: #fff; border-radius: 5px; font-size: 32px; font-weight: 700; text-align: center;">เหมาะสำหรับ</th>
                <?php
                foreach ($review_case as $row) {
                    echo '<td>' . $row['suitable'] . '</td>';
                }
                ?>
            </tr>
            <tr>
                <th>ข้อดี</th>
                <?php
                foreach ($review_case as $row) {
                    echo '<td>' . $row['strength'] . '</td>';
                }
                ?>
            </tr>
            <tr>
                <th>ปริมาณ</th>
                <?php
                foreach ($review_case as $row) {
                    echo '<td>' . $row['quantity'] . '</td>';
                }
                ?>
            </tr>
            <tr>
                <th>ราคา</th>
                <?php
                foreach ($review_case as $row) {
                    echo '<td>' . $row['price'] . '</td>';
                }
                ?>
            </tr>
            <tr>
                <th>ซื้อสินค้าได้ที่</th>
                <?php
                foreach ($review_case as $row) { 
                    // เพิ่มโค้ดที่ต้องการ
                }
                ?>
            </tr>
        </table>
    </div>
</div>


</body>

</html>