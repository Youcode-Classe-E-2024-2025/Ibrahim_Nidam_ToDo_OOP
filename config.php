<?php
class Database {
    private $host = "localhost";
    private $dbname = "taskflow_db";
    private $user = "root";
    private $pass = "";
    public $db;

    public function getConnection() {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
            $this->db = new PDO($dsn, $this->user, $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->db;
        } catch (PDOException $e) {
            error_log("Database Connection Error: " . $e->getMessage());
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
?>