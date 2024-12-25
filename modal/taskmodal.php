<?php
require "config.php";
class task {
    protected $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllTasks(){
        $sql = "SELECT * FROM taks";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $tasks = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $tasks[] = $row;
        }
        return $tasks;
    }
}
?>