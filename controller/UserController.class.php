<?php

require_once 'MainController.class.php';

class UserController extends MainController{
    public function index()
    {
        $users = $this->displayUsers();
        require_once 'view/task_form.php';
    }
    
}


