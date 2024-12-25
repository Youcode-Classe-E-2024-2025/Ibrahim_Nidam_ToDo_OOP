<?php

require_once 'config.php';
require_once 'model/TaskModel.class.php';

class MainController
{
    protected $taskModel;

    public function __construct(){
        $this->taskModel = new TaskModel();
    }

    public function displayTasks(){
        $tasks = $this->taskModel->getAllTasks();
        return $tasks;
    }
    public function CreateTask(){
        $this->taskModel->CreateTask();
    }

}
