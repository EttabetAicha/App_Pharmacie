<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . '/../vendor/autoload.php';


use App\Controllers\PatientController;
use App\Controllers\AuthController;
use App\DAO\MedicationDAO;
use App\Controllers\PatientEnligneController;
use App\Routes\Router;

session_start();


ob_start();


$router = new Router();


$router->get('/', 'App\Controllers\patientEnligneController@displayinterface');
$router->get('/login', 'App\Controllers\AuthController@showLoginForm');
$router->post('/login', 'App\Controllers\AuthController@authenticate');
$router->get('/patientdashboard', 'App\Controllers\PatientController@showDashboard');



$router->route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);


ob_end_flush();
?>