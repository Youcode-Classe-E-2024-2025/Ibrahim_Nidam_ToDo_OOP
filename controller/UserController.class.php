<?php

require_once 'MainController.class.php';

class UserController extends MainController{

    public function index()
    {
        $users = $this->displayUsers();
        require_once 'view/task_form.php';
    }

    public function processCreateTaskUsers($taskId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $users = []; 
            $users = $_POST["users"]; 

            $result = [];
            foreach ($users as $userId) {
                $result[] = ['task_id' => $taskId, 'user_id' => $userId];
            }

            $this->UserModel->CreateUser($result);
            header('Location: index.php');
            exit;

        }
    }

    public function signUp()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $userModel = new UserModel();
            $userModel->create('users', [
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);

            header('Location: index.php?action=login');
            exit;
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $userModel = new UserModel();
            $user = $userModel->read('users', ['email' => $email]);
            
            if ($user && password_verify($password, $user[0]['password'])) {
                session_start();
                $_SESSION['user'] = $user[0]['id'];
                $_SESSION['user_role'] = $user[0]['role'];
                $_SESSION['user_name'] = $user[0]['name'];
                header('Location: index.php?action=list');
                exit;
            } else {
                echo "Invalid email or password.";
            }
        }
        require_once 'view/sections/login.php';
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ?action=login");
        exit;
    }

}