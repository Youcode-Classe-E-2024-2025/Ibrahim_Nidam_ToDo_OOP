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
            $tag = $_POST["tag"];
    
            $data = [
                'title' => $title,
                'description' => $description,
                'due_datetime' => $due_date,
                'status' => $status,
            ];
    
            if (!empty($tag)) {
                $data['tag'] = $tag;
            }
    
            $taskId = $this->taskModel->create('tasks', $data);
            
            return $taskId;
        }
    }

    public function deleteTask($id){
        $this->taskModel->deleteTask($id);
        header('Location: ?action=list');
    }

}


