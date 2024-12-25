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

}