<?php
class dashboardConfig
{
    private const DBHOST = "localhost";
    private const DBUSER = "root";
    private const DBPASS = "";
    private const DBNAME = "med4u_document";
    protected $conn = null;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=" . self::DBHOST . ";dbname=" . self::DBNAME, self::DBUSER, self::DBPASS);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

?>