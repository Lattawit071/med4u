<?php
require_once 'config/db_conn.inc.php';

class select_pre extends dashboardConfig
{

    private $table;

    private function set_table($table)
    {
        $this->table = $table;
        return $this->table;
    }

    private function get_table()
    {
        return $this->table;
    }

    protected function get_req($table)
    {
        $this->set_table($table);
        $__GET__TABLE = $this->get_table();

        $res = $this->table($__GET__TABLE);
        return  $res;
    }

    private function table($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute();
        $row_data = $stmt->fetchAll();

        return $row_data;
    }
}
