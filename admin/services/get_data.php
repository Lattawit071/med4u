<?php
require_once '../config/admin_conn.inc.php';
require_once '../config/admin_conn_dashboard.php';
class getAdminData extends Config
{

    public function qrydata($uid)
    {
        $sql = "SELECT * FROM user WHERE uid = :uid";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            'uid' => $uid
        ]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $email = $data['email'];

        $res = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email
        ];
        return $res;
    }
}

class get_qry_dataTable extends dashboardConfig
{

    public function get_qry_data_table($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $row_data = $stmt->fetchAll();

        return $row_data;
    }

    public function read_one($id, $table)
    {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $res = $stmt->fetchAll();

        return $res;
    }
}
