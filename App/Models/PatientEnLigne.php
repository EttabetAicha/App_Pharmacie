<?php

namespace App\Models;

use App\DAO\UserDAO;
use Authenticatable;
use DatabaseConnection;
use PDO;

class PatientEnligne extends User implements Authenticatable
{
    protected $email;
    protected $passwordHash;
    public function __construct($email, $passwordHash)
    {
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPasswordHash()
    {
        return $this->passwordHash;
    }


    public function login($enteredEmail, $enteredPassword)
    {
        $conn = DatabaseConnection::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");

        $stmt->bindValue(1, $enteredEmail);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($enteredPassword, $user['password'])) {
            return $user;
        }

        return false;
    }
    public function register($data)
    {
        $conn = DatabaseConnection::getConnection();

        if (isset($data['email']) && isset($data['password'])) {
            $passhash = password_hash($data['password'], PASSWORD_DEFAULT);

            $role = 'patientEnligne';

            $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, type) VALUES (?, ?, ?, ?)");

            $stmt->bindValue(1, $data['full_name']); 
            $stmt->bindValue(2, $data['email']);
            $stmt->bindValue(3, $passhash);
            $stmt->bindValue(4, $role);

            $result = $stmt->execute();
            
            return $result;
        }}
}
