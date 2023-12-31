<?php

use Config\DatabaseConnection;

class UserDAO {
    protected $id;
    protected $fullName;
    protected $email;
    protected $passwordHash;

    public function getEmail() {
        return $this->email;
    }

    public function getPasswordHash() {
        return $this->passwordHash;
    }

    public static function getUserByEmail($email) {
        
        $pdo = DatabaseConnection::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            return new UserDAO($userData['id'], $userData['full_name'], $userData['email'], $userData['password_hash']);
        }

        return null; 
    }

    public static function createUser($fullName, $email, $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $pdo = DatabaseConnection::getConnection();

        try {
            $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password_hash) VALUES (?, ?, ?)");
            $stmt->execute([$fullName, $email, $passwordHash]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getAllUsers() {
        $pdo = DatabaseConnection::getConnection();

        try {
            $stmt = $pdo->query("SELECT * FROM users");
            $users = [];

            while ($userData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $users[] = new UserDAO($userData['id'], $userData['full_name'], $userData['email'], $userData['password_hash']);
            }

            return $users;
        } catch (PDOException $e) {
            return [];
        }
    }

    public static function updateUser($id, $fullName, $email, $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $pdo = DatabaseConnection::getConnection();

        try {
            $stmt = $pdo->prepare("UPDATE users SET full_name = ?, email = ?, password_hash = ? WHERE id = ?");
            $stmt->execute([$fullName, $email, $passwordHash, $id]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function deleteUser($id) {
        $pdo = DatabaseConnection::getConnection();

        try {
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$id]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
