<?php

require "modal/taskmodal.php";
class TaskController{

   public function DsiplayTask(){
    $task = new Task();
    $tasksarray = $task->getAllTasks();
    include "view/dispalyTasks.php";
   }
   

}