<?php

require_once 'MainController.class.php';

class TaskController extends MainController
{
    public function index()
    {
        $tasks = $this->displayTasks();
        require_once 'view/kanban.php';
    }

}


