<?php

namespace App\Controllers;

use App\DAO\UserDAO;
use App\Models\User;

use Dompdf\Dompdf;
use Dompdf\Options;
class AdminController
{

    public function showAdminDashboard()
    {
        return require(__DIR__ . "/../../Views/dashboard/dashboard.php");
    }

    public function index()
    {
        $userDAO = new UserDAO;
        $users = $userDAO->getallUsers([]);
        require(__DIR__ . "/../../Views/dashboard/user_page.php");
    }
    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cin = $_POST['CIN'];
            $userDAO = new UserDAO;
            $result = $userDAO->deleteUser($cin);

            if ($result) {
                header('location: /users');
                exit;
            } else {
                print_r($result);
            }
        }
    }


    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cin = $_POST['addCIN'];
            $fullName = $_POST['addFullName'];
            $email = $_POST['addEmail'];
            $password = $_POST['addPassword'];
            $type = $_POST['addType'];
            $newUser = new User($cin, $fullName, $email, $password, $type);
            $userDAO = new UserDAO;
            $userDAO->createUser($newUser);
            header('location: /users');
        }
    }

    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cin = $_POST['cin'];
            $fullName = $_POST['updateFullName'];
            $email = $_POST['updateEmail'];
            $type = $_POST['updateType'];
            $updatedUser = new User($cin, $fullName, $email, '', $type);
            $userDAO = new UserDAO;
            $userDAO->updateUser($updatedUser);
            header('location: /users');
        }
    }
    public function exportToPDF() {
        $userDAO = new UserDAO;
        $users = $userDAO->getAllUsers();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);

        $html = '<html><body>';
        foreach ($users as $user) {
            $html .= '<p>CIN: ' . $user['CIN'] . ', Full Name: ' . $user['full_name'] . ', Email: ' . $user['email'] . ', Type: ' . $user['type'] . '</p>';
        }
        $html .= '</body></html>';
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("user_list.pdf", [
            "Attachment" => false
        ]);
    }
   
}
