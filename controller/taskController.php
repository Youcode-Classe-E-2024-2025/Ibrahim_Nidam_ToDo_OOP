<?php

require "model/taskmodal.php";
class TaskController{

   public function DisplayTask(){
    $task = new Task();
    $tasksarray = $task->getAllTasks();
    include "view/kanban.php";
   }
   

}

// <?php

// require_once __DIR__ . '/../models/Task.php';

// class TaskController {
//     private $taskModel;

//     public function __construct($db) {
//         $this->taskModel = new Task($db);
//     }

//     public function handleFormSubmission() {
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             $title = trim($_POST['title']);
//             $description = trim($_POST['description']);
//             $dueDate = $_POST['due_date'] . 'T' . $_POST['due_time_hh'] . ':' . $_POST['due_time_mm'];
//             $priority = $_POST['priority'];
//             $status = 'pending'; 

//             if (empty($title) || preg_match('/[^A-Za-z\s]/', $title)) {
//                 echo "Invalid title.";
//                 return;
//             }

//             if (empty($priority)) {
//                 echo "Priority is required.";
//                 return;
//             }

//             $creationDate = (new DateTime())->format('Y-m-d\TH:i');
//             if ($dueDate <= $creationDate) {
//                 echo "Due date must be in the future.";
//                 return;
//             }

//             $taskData = [
//                 'id' => 'task-' . time() . '-' . rand(1000, 9999),
//                 'title' => $title,
//                 'description' => $description,
//                 'due_date' => $dueDate,
//                 'creation_date' => $creationDate,
//                 'priority' => $priority,
//                 'status' => $status,
//             ];

//             $this->taskModel->addTask($taskData);
//             echo "Task added successfully!";
//         }
//     }
// }