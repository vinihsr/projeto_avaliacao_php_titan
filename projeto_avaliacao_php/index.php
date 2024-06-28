<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/Database.php';
require_once 'model/User.php';
require_once 'controller/UserController.php';

$database = new Database();
$db = $database->connect();
$userController = new UserController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($name) && !empty($email) && !empty($password)) {
        $userController->createUser($name, $email, $password);
        header('Location: index.php');
        exit();
    }
}

if (isset($_GET['view']) && $_GET['view'] === 'users') {
    $users = $userController->listUsers(); // Certifique-se de que está chamando o método correto da instância correta
    require 'view/user-list.php';
    exit();
}

require 'view/user.php';
?>
