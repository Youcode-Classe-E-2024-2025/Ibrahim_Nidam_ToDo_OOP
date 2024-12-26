<?php
require 'controller/TaskController.class.php';
require 'controller/UserController.class.php';

$action = $_GET["action"] ?? "list";

$taskController = new TaskController();
$UserController = new UserController();
switch ($action) {

    case "list":  $taskController->index();;
    break;
    case "create_form":
        $UserController->index();
        break;
    case "create":
       $id = $taskController->processCreateTask();
       $UserController->processCreateTaskUsers($id);
    break;
    
}
?>