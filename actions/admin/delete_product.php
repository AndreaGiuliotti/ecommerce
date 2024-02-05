<?php
require_once '../../connessione/Database.php';
require_once '../../models/Product.php';
require_once '../../models/CartProduct.php';

$product = Product::Find_by_id($_POST['id']);

try {
    if (!CartProduct::Delete_All_Product_Id($_POST['id']) || !$product->delete($_POST)) {
        throw new Exception("Impossibile eliminare il prodotto del listino");
    }
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
header("Location: http://localhost:63342/E-Commerce_V2/views/products/index.php");