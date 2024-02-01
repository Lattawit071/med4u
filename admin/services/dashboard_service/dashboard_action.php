<!-- <script src="../toastr/jquery-3.6.4.min.js"></script> -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">

<?php
require_once 'method_dashboard.php';
$Dashboard = new AdminDashboard;
session_start();

if (isset($_POST['header'])) {

    if (empty($_POST['textTitle'] || $_POST['textLink'])) {
        $_SESSION['alert'] = 'กรุณากรอกให้ครบถ้วน';
        $_SESSION['toast'] = 'info';

        header('Location: ../../views/mainpages.php');
    } else {
        $title = $_POST['textTitle'];
        $link = $_POST['textLink'];
        $admin_id = $_SESSION['admin_login'];

        if (filter_var($link, FILTER_VALIDATE_URL)) {

            $res = $Dashboard->header($title, $link, $admin_id);
            if ($res == true) {
                $_SESSION['alert'] = 'ทำรายการเสร็จสิ้น';
                $_SESSION['toast'] = 'success';

                header('Location: ../../views/mainpages.php');
            } else {
                $_SESSION['alert'] = 'ไม่สำเร็จ';
                $_SESSION['toast'] = 'error';

                header('Location: ../../views/mainpages.php');
            }
        } else {
            $_SESSION['alert'] = 'รูปแบบของลิงก์ หรือข้อความไม่ถูกต้อง';
            $_SESSION['toast'] = 'warning';

            header('Location: ../../views/mainpages.php');
        }
    }
}

if (isset($_POST['carousel'])) {
    $img = $_FILES['img'];
    $admin_id = $_SESSION['admin_login'];

    $res = $Dashboard->carousel($img, $admin_id);
    if ($res == true) {
        $_SESSION['alert'] = 'อัพโหลดเสร็จสิ้น';
        $_SESSION['toast'] = 'success';

        header('Location: ../../views/mainpages.php');
    } else if ($res == "Not Match") {
        $_SESSION['alert'] = 'ไฟล์ไม่ใช่ชนิด jpg, jpeg, png';
        $_SESSION['toast'] = 'error';
    } else {
        $_SESSION['alert'] = 'อัพโหลดไม่สำเร็จ';
        $_SESSION['toast'] = 'error';

        header('Location: ../../views/mainpages.php');
    }
}

if (isset($_GET['delete'])) {
    $current_page = $_SESSION['pages'];
    if ($_GET['delete'] == 'delete') {

        if ($_GET['table'] == null) {
            $_SESSION['alert'] = 'ไม่ได้ระบุตารางไว้';
            $_SESSION['toast'] = 'error';

            header('refresh: 1; url=../../views/mainpages.php');
        } else {

            if ($_GET['img_id'] == null) {
                $_SESSION['alert'] = 'ไม่พบ';
                $_SESSION['toast'] = 'error';
                header('refresh: 1; url=../../views/mainpages.php');
            } else {
                $admin_id = $_SESSION['admin_login'];
                $img_name = $_GET['img_name'];
                $res = $Dashboard->delete_data($img_name, $_GET['table'], $_GET['img_id'], $admin_id);
                $_SESSION['alert'] = 'ลบเสร็จสิ้น';
                $_SESSION['toast'] = 'info';
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'เสร็จสิ้น',
                            text: 'ทำการลบเรียบร้อย',
                            icon: 'success',
                            timer : '4000',
                            showConfirmButton: false,
                        });
                    });
                </script>";
                header("refresh: 1; url=../../views/$current_page");
            }
        }
    } else {
        $_SESSION['alert'] = 'ลบไม่สำเร็จ';
        $_SESSION['toast'] = 'error';
        header('refresh: 1; url=../../views/mainpages.php');
    }
}

if (isset($_POST['disease'])) {
    $img = $_FILES['img'];
    $text_title = $_POST['text-title'];
    $admin_id = $_SESSION['admin_login'];

    $res = $Dashboard->img_icon_disease($img, $admin_id, $text_title);
    if ($res == true) {
        $_SESSION['alert'] = 'อัพโหลดเสร็จสิ้น';
        $_SESSION['toast'] = 'success';

        header('Location: ../../views/disease.php');
    } else if ($res == "Not Match") {
        $_SESSION['alert'] = 'ไฟล์ไม่ใช่ชนิด jpg, jpeg, png';
        $_SESSION['toast'] = 'error';
    } else {
        $_SESSION['alert'] = 'อัพโหลดไม่สำเร็จ';
        $_SESSION['toast'] = 'error';

        header('Location: ../../views/disease.php');
    }
}

if (isset($_POST['disease-edit'])) {
    $current_page = $_SESSION['pages'];
    $img = $_FILES['img'];
    $id = $_POST['id'];
    $text_title = $_POST['text-title'];
    $table = $_POST['table'];

    $res = $Dashboard->update_data_img($img, $id, $text_title, $table);
    if ($res == true) {
        $_SESSION['alert'] = 'อัพโหลดเสร็จสิ้น';
        $_SESSION['toast'] = 'success';
        echo "<script>
        $(document).ready(function() {
            Swal.fire({
                title: 'เสร็จสิ้น',
                text: 'อัพเดต',
                icon: 'success',
                timer : '4000',
                showConfirmButton: false,
            });
        });
    </script>";
        header("refresh: 1; url=../../views/$current_page");
    } else if ($res == "Not Match") {
        $_SESSION['alert'] = 'ไฟล์ไม่ใช่ชนิด jpg, jpeg, png';
        $_SESSION['toast'] = 'error';
    } else {
        $_SESSION['alert'] = 'อัพโหลดไม่สำเร็จ';
        $_SESSION['toast'] = 'error';

        header('Location: ../../views/mainpages.php');
    }
}
