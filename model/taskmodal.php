<?php
require "config.php";

class Task {
    protected $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllTasks() {
        try {
            $sql = "SELECT * FROM tasks";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $tasks;
        } catch (PDOException $e) {
            error_log("Error fetching tasks: " . $e->getMessage());
            return [];
        }
    }
}

?>