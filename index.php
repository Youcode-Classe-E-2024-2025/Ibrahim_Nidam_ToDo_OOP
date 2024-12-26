<?php
require 'controller/TaskController.class.php';
require 'controller/UserController.class.php';

$action = $_GET["action"] ?? "login";

$taskController = new TaskController();
$UserController = new UserController();

switch ($action) {

    case "login":  $taskController->login();
    break;
    case "list":  $taskController->index();
    break;
    case "create_form":
        $UserController->index();
        break;
    case "create":
        $id = $taskController->processCreateTask();
        $UserController->processCreateTaskUsers($id);
    break;
    case "delete":
        $taskController->deleteTask($_GET['id']);
    break;
}
?>