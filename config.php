<?php


class Database {

    private $host = "localhost";
    private $dbname = "taskflow_db";
    private $user = "root";
    private $pass = "";

     public $db;

     public function getConnection() {
        try {
            $dsn = "mysql:host=$this->host";
            $this->db = new PDO($dsn, $this->user, $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $this->db->exec("CREATE DATABASE IF NOT EXISTS $this->dbname");
            $this->db->exec("USE $this->dbname");
    
            $tableExists = $this->db->query("SHOW TABLES LIKE 'users'")->rowCount() > 0;
    
            if (!$tableExists) {
                $sqlScriptPath = __DIR__ . "/database/script.sql";
                if (!file_exists($sqlScriptPath)) {
                    throw new Exception("SQL script file not found at: $sqlScriptPath");
                }
    
                $sqlScript = file_get_contents($sqlScriptPath);
                if ($sqlScript === false || empty(trim($sqlScript))) {
                    throw new Exception("SQL script is empty or unreadable.");
                }
    
                $this->db->exec($sqlScript);
            }
        return $this->db;
        } catch (PDOException $e) {
            error_log("Database Setup Error: " . $e->getMessage());
            die("Database error: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Setup Error: " . $e->getMessage());
            die("Setup error: " . $e->getMessage());
        }
    }
}

$db = new Database();
$db -> getConnection();
?>