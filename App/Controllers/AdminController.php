<?php

namespace App\Controllers;

class AdminController {
   
    public function showAdminDashboard() {
        return require(__DIR__ ."/../../Views/dashboard/dashboard.php");
    }
}