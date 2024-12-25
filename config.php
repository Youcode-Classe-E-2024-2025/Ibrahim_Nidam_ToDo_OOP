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
             $this->db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
             $this->db -> exec("CREATE DATABASE IF NOT EXISTS $this->dbname");
             $this->db -> exec("USE $this->dbname");
         
             $tableExists = $this->db -> query("SHOW TABLES LIKE 'users'") -> rowCount() > 0;
         
             if (!$tableExists) {
                 $sqlScript = file_get_contents(__DIR__ . "database/script.sql");
                 $this->db -> exec($sqlScript);
             }
         
         } catch (PDOException $e) {
             error_log("Database Setup Error: " . $e -> getMessage());
             die("Database error: " . $e -> getMessage());
         }
         return $this->db;
     }
    
}
?>