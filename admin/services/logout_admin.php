<?php
require_once '../../config/admin_conn.inc.php';

class signout extends Config
{

    function signOut($uid)
    {


        $sql = "SELECT * FROM log_admin_signin WHERE admin_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'user_id' => $uid
        ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $data = [
            'ip' => $row['ip'],
            'browser' => $row['browser'],
            'device' => $row['device'],
            'name' => $row['admin_name'],
            'event' => "logout",
        ];

        $logout_data_sql = "INSERT INTO log_admin_signin(admin_id, admin_name, ip, browser, device, event) 
        VALUES(:admin_id, :admin_name, :ip, :browser, :device, :event)";

        $stlt = $this->conn->prepare($logout_data_sql);
        $stlt->execute([
            "admin_id" =>  $uid,
            "admin_name" => $data['name'],
            "ip" => $data['ip'],
            "browser" => $data['browser'],
            "device" => $data['device'],
            "event" => $data['event'],
        ]);

        unset($_SESSION['admin_login']);
        header('location:../../signin.php');
    }
}
