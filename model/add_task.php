<?php

class Task {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addTask($taskData) {
        $sql = "INSERT INTO tasks (id, title, description, due_date, creation_date, priority, status)
                VALUES (:id, :title, :description, :due_date, :creation_date, :priority, :status)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($taskData);
    }
}
