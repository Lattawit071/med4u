<?php
session_start();
require_once '../../config/admin_conn.inc.php';

class DB extends Config
{

    public function signin($email, $pass)
    {
        require_once '../provider/datalog.php';
        $info = new datalog;
        try {
            $sql = "SELECT * FROM user WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'email' => $email,
            ]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0) {
                if ($res['email'] == $email) {
                    if (password_verify($pass, $res['password'])) {
                        if ($res['urole'] == 'admin') {
                            $_SESSION['admin_login'] = $res['uid'];
                            $data_login = [
                                'id' => $res['uid'],
                                'name' => $res['uid'],
                                'ip' => $info->ip,
                                'browser' => $info->browser,
                                'device' => $info->device,
                                'name' => $res['firstname'] . " " . $res['lastname'],
                                'event' => "login",
                            ];
                            $log = $this->log_login($data_login);
                            if ($log == true) {
                                header('Location:../../views/admin.php');
                            } else {
                                $_SESSION['error'] = "Cannot Signin";
                            }
                        } else {
                            $_SESSION['user_login'] = $res['uid'];
                            header('Location:../../index.php');
                        }
                    } else {
                        $_SESSION['error'] = "รหัสผ่านผิด";
                        header('Location:../../signin.php');
                    }
                } else {
                    $_SESSION['error'] = "อีเมลผิด";
                    header("location: ../../signin.php");
                }
            } else {
                $_SESSION['error'] = "ไม่พบข้อมูลผู้ใช้ในระบบ";
                header("location: ../../signin.php");
            }
        } catch (PDOException $e) {
            die("error: " . $e->getMessage());
        }
    }

    private function log_login(array $data)
    {
        try {
            $sql = "INSERT INTO log_admin_signin(admin_id, admin_name, ip, browser, device, event) 
                    VALUES(:admin_id, :admin_name, :ip, :browser, :device, :event)";
            $ins = $this->conn->prepare($sql);
            $ins->execute([
                'admin_id' => $data['id'],
                'admin_name' => $data['name'],
                'ip' => $data['ip'],
                'browser' => $data['browser'],
                'device' => $data['device'],
                'event' => $data['event']
            ]);
            return true;
        } catch (PDOException $e) {
            die('error ' . $e->getMessage());
        }
    }

    public function signup($firstname, $lastname, $email, $password, $repeat_password)
    {

        if (empty($firstname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อของท่าน';
            header('Location:../../signup.php');
        } else if (empty($lastname)) {
            $_SESSION['error'] = 'กรุณากรอกนามสกุลของท่าน';
            header('Location:../../signup.php');
        } else if (empty($email)) {
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
        } else if ($password != $repeat_password) {
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header('Location:../../signup.php');
        } else {
            try {
                $sql = "SELECT email FROM user WHERE email = :email";
                $qry = $this->conn->prepare($sql);
                $qry->execute([
                    ":email" => $email
                ]);
                $res = $qry->fetch();
            } catch (PDOException $e) {
            }
        }
    }
}
