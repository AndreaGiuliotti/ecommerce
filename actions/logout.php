<?php
require_once '../models/User.php';

session_start();
$_SESSION = null;
header('Location: http://localhost:63342/E-Commerce_V2/views/login.php');
