<?php
require_once '../../config/admin_conn.inc.php';
require_once 'signin_db.php';
require_once '../logout_admin.php';
$DB = new DB();
$aclog = new signout;


if (isset($_POST["signin"])) {
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $res = $DB->signin($email, $pass);
} else if (isset($_POST['signup'])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeat_password = $_POST["repeat-password"];
} else if (isset($_GET['req'])) {

    if (($_GET['req'] == 'logout')) {
        $uid = $_GET["uid"];
        $res = $aclog->signOut($uid);
    }
}
