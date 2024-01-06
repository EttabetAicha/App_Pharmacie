<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . '/../vendor/autoload.php';


use App\Controllers\PatientController;
use App\Controllers\AuthController;
use App\DAO\MedicationDAO;
use App\Controllers\PatientEnligneController;
use App\Controllers\AdminController;
use App\Controllers\MedicineController;
use App\Routes\Router;

session_start();


ob_start();


$router = new Router();

//get
$router->get('/', 'App\Controllers\patientEnligneController@displayinterface');
$router->get('/authetification', 'App\Controllers\AuthController@displayInterface');
$router->get('/dashboard', 'App\Controllers\AdminController@showAdminDashboard');
$router->get('/users', 'App\Controllers\AdminController@index');
$router->get('/medicine', 'App\Controllers\MedicineController@index');
$router->get('/exportPdf', 'App\Controllers\AdminController@exportToPDF');
$router->get('/exportMedicineToPDF', 'App\Controllers\MedicineController@exportMedicineToPDF');


//-------------------------------------------------------------------------------------------------------------------------
//post
$router->post('/register', 'App\Controllers\AuthController@signup');
$router->post('/login', 'App\Controllers\AuthController@signin');
//for user
$router->post('/user/edit', 'App\Controllers\AdminController@updateUser');
$router->post('/user/delete', 'App\Controllers\AdminController@deleteUser');
$router->post('/adduser', 'App\Controllers\AdminController@addUser');
//for medicine 
$router->post('/medicine/edit', 'App\Controllers\MedicineController@updateMedicine');
$router->post('/medicine/delete', 'App\Controllers\MedicineController@deleteMedicament');
$router->post('/addmedicine', 'App\Controllers\MedicineController@addMedicament');






$router->route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);


ob_end_flush();
?>