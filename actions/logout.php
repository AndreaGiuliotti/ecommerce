<?php
require_once '../models/User.php';

session_start();
$_SESSION = null;
header('Location: http://localhost/ecommerce/views/login.php');
