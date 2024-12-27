<?php 
require_once 'MainModel.class.php';
class UserModel extends MainModel {
    private $table = "users";
    private $taskUsers = "task_users";
    
    public function getAllUsers()
    {
        return $this->read($this->table);
    }
    
    public function CreateUser($data){
        $this->create($this->taskUsers, $data);
    }
    
    public function getUserRole($userId) {
        $user = $this->read($this->table, ['id' => $userId]);
        return $user[0]['role'] ?? 'user';
    }
    
    public function getUserTasks($userId) {
        $sql = "SELECT t.* FROM tasks t 
                INNER JOIN task_users tu ON t.id = tu.task_id 
                WHERE tu.user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}