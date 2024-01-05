<?php

namespace App\Controllers;

use App\Models\User;
use App\DAO\UserDAO;

class AuthController
{
    public function displayInterface()
    {
        return require(__DIR__ . '/../../Views/login.php');
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cin = $_POST['cin'];
            $fullName = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $type = 'patientEnligne';
            $user = new User($cin, $fullName, $email, $password, $type);
            $userDAO = new UserDAO();

            try {
                if ($userDAO->createUser($user)) {
                    // Registration successful, redirect to login page
                    header("Location: /authetification");
                    echo'bawsa';
                   
                } else {
                    header("Location: /authetification");

                }
            } catch (\Exception $e) {
                echo "Error creating user: " . $e->getMessage();
            }
        } else {
            echo "Invalid request method";
        }
    }

    public function signin()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userDAO = new UserDAO();
        $userData = $userDAO->getUserByEmail($email);

        if ($userData && $password === $userData['password']) {
            $user = new User(
                $userData['CIN'],
                $userData['full_name'],
                $userData['email'],
                $userData['password'],
                $userData['type']
            );

            $_SESSION['cin'] = $user->getCin();
            $_SESSION['type'] = $user->getType();

            if ($user->getType() === 'Admin') {
                header("Location: /dashboard");
            } elseif ($user->getType() === 'PatientEnligne') {
                header("Location: /");
            } else {
                echo "Invalid user type";
            }
            exit();
        } else {
            echo "Invalid email or password. Debug Info:";
            echo "<pre>";
            print_r($userData);
            echo "</pre>";
        }
    } else {
        echo "Invalid request method";
    }
}

    
}
