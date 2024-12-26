<?php
require 'controller/TaskController.class.php';

$action = $_GET["action"] ?? "list";

$taskController = new TaskController();
$UserController = new UserController();
switch ($action) {

    case "list":  $taskController->index();;
    break;
    case "create_form":
        $taskController->showCreateForm();
        break;
    case "create":
        $taskController->processCreateTask();
        $$UserController->index();
        break;
    
}
?>