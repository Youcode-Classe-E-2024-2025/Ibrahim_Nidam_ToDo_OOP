<?php 
require_once 'MainModel.class.php';
class UserModel extends MainModel{

  private $table = "users";


  public function getAllUsers()
    {
        return $this->read($this->table);

    }


}