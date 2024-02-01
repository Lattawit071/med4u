<?php 
    session_start();
    require_once '../../config/admin_conn.inc.php'; ;

    if (isset($_POST['signup'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat-password'];
        $urole = 'user';


        if (empty($firstname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อของท่าน';
            header('Location:../../signup.php');  
        } else if(empty($lastname)) {
            $_SESSION['error'] = 'กรุณากรอกนามสกุลของท่าน'; 
            header('Location:../../signup.php'); 
        } else if(empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล'; 
            header('Location:../../signup.php'); 
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง'; 
            header('Location:../../signup.php'); 
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน'; 
            header('Location:../../signup.php'); 
        } else if (strlen($password) > 20 || strlen($password) < 6) {
            $_SESSION['error'] = 'รหัสผ่านท่านต้องมากกว่า 6 ถึง 20 ตัวอักษร'; 
            header('Location:../../signup.php');
        } else if (empty($repeat_password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header('Location:../../signup.php');
        } else if($password != $repeat_password) {
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header('Location:../../signup.php');
        } else {
            try {
                
                $check_email = $conn->prepare("SELECT email FROM user WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: ../../signup_db.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO user(firstname, lastname, email, password, urole) 
                                            VALUES(:firstname, :lastname, :email, :password, :urole)");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='signin.php' class='alert-link'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: ../../signup.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: ../../signup.php");
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
