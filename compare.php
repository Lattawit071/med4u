<?php
require_once 'config/db_conn.inc.php';
require_once 'service/action.php';

// สร้างการเชื่อมต่อฐานข้อมูล
$dbConfig = new DashboardConfig();
$conn = $dbConfig->getConnection();

// กำหนดจำนวนสินค้าที่จะแสดงต่อหน้า
$items_per_page = 4;

// กำหนดหน้าปัจจุบัน (ถ้ามี)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// คำนวณ OFFSET สำหรับ SQL Query
$offset = ($page - 1) * $items_per_page;

// ดึงข้อมูลสินค้าจากฐานข้อมูลพร้อมการแบ่งหน้า
$sql = "SELECT * FROM review_case LIMIT :limit OFFSET :offset";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':limit', $items_per_page, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$review_case = $stmt->fetchAll(PDO::FETCH_ASSOC);

// คำนวณจำนวนหน้าทั้งหมด
$total_items_sql = "SELECT COUNT(*) AS count FROM review_case";
$total_items_stmt = $conn->query($total_items_sql);
$total_items = $total_items_stmt->fetch(PDO::FETCH_ASSOC)['count'];
$total_pages = ceil($total_items / $items_per_page);

// ดึงผลิตภัณฑ์ที่ผู้ใช้เลือก
$selected_products = isset($_GET['products']) ? $_GET['products'] : [];
$selected_products_data = [];
if (!empty($selected_products)) {
    $placeholders = implode(',', array_fill(0, count($selected_products), '?'));
    $sql = "SELECT * FROM review_case WHERE id IN ($placeholders)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($selected_products);
    $selected_products_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #062E73;
            color: #fff;
            text-align: center;
        }
        th img {
            width: 100px;
            height: auto;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .pagination a {
            padding: 10px 15px;
            margin: 0 5px;
            border: 1px solid #ddd;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
        }
        .pagination a.active {
            background-color: #062E73;
            color: #fff;
        }
        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <!-- include component header -->
    <?php include 'components/header.php'; ?>
    <!-- include component navbar -->
    <?php include 'components/nav.php'; ?>
    <div class="container">
        <h3 style="text-align: center; color: #062E73; font-weight: bold;">เปรียบเทียบผลิตภัณฑ์</h3>
        <div class="bg" style="width: 100%; max-width: 1300px; height: auto; border-radius: 20px; background: #F4F4F4; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); overflow-x: auto; overflow-y: hidden;">
            <table>
                <thead>
                    <tr>
                        <th>ผลิตภัณฑ์</th>
                        <?php foreach ($review_case as $row) : ?>
                            <th>
                                <img src="./uploads/รีวิว/<?= htmlspecialchars($row['img']) ?>" alt="">
                            </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>ชื่อสินค้า</th>
                        <?php foreach ($review_case as $row) : ?>
                            <td><?= htmlspecialchars($row['product_name']) ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <th>จุดเด่น</th>
                        <?php foreach ($review_case as $row) : ?>
                            <td><?= htmlspecialchars($row['prominent_point']) ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <th>เหมาะสำหรับ</th>
                        <?php foreach ($review_case as $row) : ?>
                            <td><?= htmlspecialchars($row['suitable']) ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <th>ข้อดี</th>
                        <?php foreach ($review_case as $row) : ?>
                            <td><?= htmlspecialchars($row['strength']) ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <th>ปริมาณ</th>
                        <?php foreach ($review_case as $row) : ?>
                            <td><?= htmlspecialchars($row['quantity']) ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <th>ราคา</th>
                        <?php foreach ($review_case as $row) : ?>
                            <td><?= htmlspecialchars($row['price']) ?></td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- เพิ่มการนำทางหน้า -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>">หน้าก่อนหน้า</a>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?= $i ?>" class="<?= $i === $page ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?= $page + 1 ?>">หน้าถัดไป</a>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
