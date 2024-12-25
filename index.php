<?php
require 'controller/taskController.php';

$action = $_GET["action"] ?? "list";
switch ($action) {
    case "list": Getcontacts();
    break;

    case "add": Addcontacts();
    break;

}
?>