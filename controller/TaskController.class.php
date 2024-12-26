<?php

require_once 'MainController.class.php';

class TaskController extends MainController{
    public function index()
    {
        $tasks = $this->displayTasks();
        $completionPercentage = $this->taskModel->getCompletionPercentage();
        require_once 'view/kanban.php';
    }

    
    public function processCreateTask() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST["title"];
            $description = $_POST["description"];
            $due_date = $_POST["due_date"];
            $status = $_POST["status"];
            $data = [
                'title' => $title,
                'description' => $description,
                'due_datetime' => $due_date,
                'status' => $status
            ];
            $this->taskModel->CreateTask($data);
            header('Location: index.php');
            exit;
        }
    }
    

}


