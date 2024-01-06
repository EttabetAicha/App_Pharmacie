<?php

namespace App\Controllers;

use App\DAO\UserDAO;

class AdminController {
    
    public function showAdminDashboard() {
        return require(__DIR__ . "/../../Views/dashboard/dashboard.php");
    }

    public function index() {
        $userDAO = new UserDAO;
        $users = $userDAO->getallUsers([]);
        require(__DIR__ . "/../../Views/dashboard/user_page.php");
    }
}
