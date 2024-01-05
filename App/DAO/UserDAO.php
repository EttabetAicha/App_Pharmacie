<?php

namespace App\DAO;
use App\Models\User;
use Config\DbConnection;

class UserDAO  {
    private $db;
    public function __construct() {
        $this->db = DbConnection::getConnection();

    }

    public function createUser(User $user) {
        try {
            $query = "INSERT INTO users (CIN, full_name, email, password, type) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$user->getCin(), $user->getFullName(), $user->getEmail(), $user->getPassword(), $user->getType()]);
        } catch (\Exception $e) {
            echo "Error creating user: " . $e->getMessage();
        }
    }

    public function getUserByCin($cin) {
        $query = "SELECT * FROM users WHERE CIN = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$cin]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    public function getUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateUser(User $user) {
        $query = "UPDATE users SET full_name = ?, email = ?, password = ?, type = ? WHERE CIN = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$user->getFullName(), $user->getEmail(), $user->getPassword(), $user->getType(), $user->getCin()]);
    }

    public function deleteUser($cin) {
        $query = "DELETE FROM users WHERE CIN = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$cin]);
    }

}
