<?php

namespace App\Controllers;

use App\Models\User;
use App\DAO\UserDAO;

class UserController {
    
    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cin = $_POST['cin'];
            $fullName = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $type = 'patientEnligne'; 
            $user = new User($cin, $fullName, $email, $password, $type);
            $userDAO = new UserDAO();
            $userDAO->createUser($user);
            require(__DIR__.'../../../Views/login.php');
            
        
        }
    }
    public function signin() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $email = $_POST['email'];
            $password = $_POST['password'];
        }
    }

}
