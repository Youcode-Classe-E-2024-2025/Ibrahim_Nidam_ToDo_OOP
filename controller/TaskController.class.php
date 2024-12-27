<?php

require_once 'MainController.class.php';

class TaskController extends MainController{


    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit;
        }
        
        if ($_SESSION['user_role'] === 'admin') {
            $tasks = $this->displayTasks();
        } else {
            $tasks = $this->UserModel->getUserTasks($_SESSION['user']);
        }
        
        $completionPercentage = $this->taskModel->getCompletionPercentage($tasks);
        require_once 'view/kanban.php';
    }

    public function processCreateTask() {
        if ($_SESSION['user_role'] !== 'admin') {
            header('Location: index.php?action=list');
            exit;
        }
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
        if ($_SESSION['user_role'] !== 'admin') {
            header('Location: index.php?action=list');
            exit;
        }
        
        $this->taskModel->deleteTask($id);
        header('Location: ?action=list');
    }

}


