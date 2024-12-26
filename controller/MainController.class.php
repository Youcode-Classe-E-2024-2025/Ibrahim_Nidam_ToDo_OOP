<?php

require_once 'config.php';
require_once 'model/TaskModel.class.php';
require_once 'model/UserModel.class.php';

class MainController
{
    protected $taskModel;
    protected $UserModel;

    public function __construct(){
        $this->taskModel = new TaskModel();
    }

    public function displayTasks(){
        $tasks = $this->taskModel->getAllTasks();
        return $tasks;
    }
    public function displayUsers(){
        $users = $this->UserModel->getAllUsers();
        return $users;
    }
    public function CreateTask(){
        $this->taskModel->CreateTask($data=[]);
    }

}
