<?php
require_once '../../config/admin_conn.inc.php';

class save_log_event extends Config
{
    private array $logevent;

    private function set_logevent(array $logevent)
    {
        $this->logevent = $logevent;
        return $this->logevent;
    }
    private function get_admin_id()
    {
        return $this->logevent;
    }

    public function qry_admin_data(array $logevent)
    {
        $logevent = $this->set_logevent($logevent);

        $__GET__LOG_DATA = $this->get_admin_id();
        $res = $this->qry($__GET__LOG_DATA);

        return $res;
    }

    private function qry($data_log)
    {

        $sql = "SELECT * FROM user WHERE uid = :uid";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            'uid' => $data_log['admin_id'],
        ]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];

        $res = [
            'admin_id' => $data_log['admin_id'],
            'name' => $firstname . " " . $lastname,
            'event' => $data_log['event']
        ];

        return $res;
    }
}
