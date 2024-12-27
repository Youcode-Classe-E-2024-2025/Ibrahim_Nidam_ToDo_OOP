<?php 
require_once 'MainModel.class.php';

class TaskModel extends MainModel {
    private $table = "tasks";
    
    public function getAllTasks()
    {
        return $this->read($this->table);
    }
    
    public function CreateTask($data){
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            throw new Exception('Unauthorized action');
        }
        return $this->create($this->table, $data);
    }
    
    public function deleteTask($id){
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            throw new Exception('Unauthorized action');
        }
        $this->delete($this->table, ['id' => $id]);
    }
    
    public function getCompletionPercentage($tasks = null){
        if ($tasks === null) {
            $tasks = $this->getAllTasks();
        }
        $totalTasks = count($tasks);
        $completedTasks = count(array_filter($tasks, fn($task) => $task['status'] === 'Done'));
        return $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;
    }

    public function updateTaskStatus($taskId, $newStatus) {
        return $this->update($this->table, 
            ['status' => $newStatus], 
            ['id' => $taskId]
        );
    }
}