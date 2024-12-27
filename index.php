<?php
require 'controller/TaskController.class.php';
require 'controller/UserController.class.php';

session_start();

$action = $_GET["action"] ?? "list";
$taskController = new TaskController();
$UserController = new UserController();

if (!in_array($action, ['login', 'signUp']) && !isset($_SESSION['user'])) {
    header('Location: index.php?action=login');
    exit;
}

switch ($action) {
    case "login":
        $UserController->login();
        break;
    case "signUp":
        $UserController->signUp();
        break;
    case "list":
        $taskController->index();
        break;
    case "create_form":
        if ($_SESSION['user_role'] === 'admin') {
            $UserController->index();
        } else {
            header('Location: index.php?action=list');
        }
        break;
    case "create":
        if ($_SESSION['user_role'] === 'admin') {
            $id = $taskController->processCreateTask();
            $UserController->processCreateTaskUsers($id);
        } else {
            header('Location: index.php?action=list');
        }
        break;
    case "delete":
        if ($_SESSION['user_role'] === 'admin') {
            $taskController->deleteTask($_GET['id']);
        } else {
            header('Location: index.php?action=list');
        }
        break;
    case "logout":
        $UserController->logout();
        break;
}
?>