<?php
require_once '../connessione/Database.php';
require_once '../models/User.php';
require_once '../models/Session.php';
require_once '../models/Cart.php';

session_start();

$email = $_POST['email'];
$password = hash('sha256', $_POST['password']);
$password_confirmation = hash('sha256', $_POST['password-confirmation']);

//controllo email già esistente
$database = new Database("localhost", "root", "");
$pdo = $database->connect("ecommerce");
$stmt = $pdo->prepare("select * from ecommerce.users where email=:email limit 1");
$stmt->bindParam(":email", $email);
$stmt->execute();

$user = $stmt->fetchObject("User");

if ($user)//email già esistente
{
    header('Location:http://localhost:63342/E-Commerce_V2/views/login.php');
    exit;
}

if (strcmp($password, $password_confirmation) != 0) { //password e conferma password non coincidono
    header('Location:http://localhost:63342/E-Commerce_V2/views/signup.php');
    exit;
}

$params = array('email' => $email, 'password' => $password);
$user = User::Create($params);
$cart = Cart::Create($user);
header("Location: http://localhost:63342/E-Commerce_V2/actions/login.php?email=" . urlencode($email) . "&password=" . urlencode($password));

exit();