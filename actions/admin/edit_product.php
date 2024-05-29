<?php
require_once '../../connessione/Database.php';
require_once '../../models/Product.php';

$product = Product::Find_by_id($_POST['id']);

try {
    if (!$product->edit($_POST)) {
        throw new Exception("Impossibile modificare il prodotto del listino");
    }
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
header("Location: http://localhost:63342/ecommerce/views/products/index.php");
