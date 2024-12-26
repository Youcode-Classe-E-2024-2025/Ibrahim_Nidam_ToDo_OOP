<?php

require_once 'MainController.class.php';

class UserController extends MainController{
    public function index()
    {
        $users = $this->displayUsers();
        require_once 'view/task_form.php';
    }

    public function processCreateTaskUsers($taskId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $users = []; 
            $users = $_POST["users"]; 

            $result = [];
            foreach ($users as $userId) {
                $result[] = ['task_id' => $taskId, 'user_id' => $userId];
            }

            $this->UserModel->CreateUser($result);
            header('Location: index.php');
            exit;

        }
    }
    

}


