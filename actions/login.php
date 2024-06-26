<?php
require_once '../connessione/Database.php';
require_once '../models/User.php';
require_once '../models/Session.php';

session_start();
if ($_GET['email']) {
    $email = $_GET['email'];
    $password = $_GET['password'];
} else {
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
}

$params_user = array('email' => $email, 'password' => $password);
$user = User::Find($params_user);
if (!$user) {
    header('Location: http://localhost/ecommerce/views/signup.php');
} else {
    $_SESSION['current_user'] = $user;
    $params = array('ip' => $_SERVER['REMOTE_ADDR'], 'data_login' => date('Y-m-d H:i:s'), 'user_id' => User::Find($params_user)->getId());
    Session::Create($params);
    header('Location: http://localhost/ecommerce/views/products/index.php');
}
exit;
