<?php
require 'controller/taskController.php';

$action = $_GET["action"] ?? "list";
$TaskController = new TaskController();
switch ($action) {
    case "list":  $TaskController->DisplayTask();
    break;
    // case "add": Addcontacts();
    // break;

}
?>