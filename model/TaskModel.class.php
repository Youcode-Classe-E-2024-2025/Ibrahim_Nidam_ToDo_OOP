<?php 
require "MainModel.class.php";

class TaskModel extends MainModel{

  private $table = "tasks";


  public function getAllTasks()
    {
        return $this->read($this->table);

    }
  
  public function CreateTask($data){
    $this->create($this->table,$data);
  }

  public function getCompletionPercentage(){
        $tasks = $this->getAllTasks();
        $totalTasks = count($tasks);
        $completedTasks = count(array_filter($tasks, fn($task) => $task['status'] === 'Done'));
        return $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;
  }

}