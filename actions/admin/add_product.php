<?php
require_once '../../connessione/Database.php';
require_once '../../models/Product.php';

$product = Product::Create($_POST);
try {
    if (!$product) {
        throw new Exception("Impossibile aggiungere il prodotto al listino");
    }
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
header("Location: http://localhost/ecommerce/views/products/index.php");
