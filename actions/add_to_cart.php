<?php
require_once '../connessione/Database.php';
require_once '../models/Cart.php';
require_once '../models/CartProduct.php';

$cart = Cart::FindByUserId($_POST['user_id']);
$params = ['cart_id' => $cart->getId(), 'product_id' => $_POST['product_id'], 'quantita' => $_POST['quantita']];
try {
    if (!$_POST['quantita'] > 0 || !CartProduct::Insert($params)) {
        throw new Exception("Non è stato possibile aggiungere i prodotti al carrello");
    }
} catch (Exception $e) {
    echo "Non è stato possibile aggiungere i prodotti al carrello";
    exit();
}

header('Location: http://localhost:63342/ecommerce/views/products/view_cart.php');
