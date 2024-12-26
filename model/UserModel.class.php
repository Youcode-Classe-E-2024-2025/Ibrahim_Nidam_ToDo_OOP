<?php 
require_once 'MainModel.class.php';
class UserModel extends MainModel{

  private $table = "users";
  private $taskUsers = "task_users";



  public function getAllUsers()
    {
        return $this->read($this->table);

    }
    public function CreateUser($data){
      $this->create($this->taskUsers,$data);
    }
  

}