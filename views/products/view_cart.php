<?php
require_once '../../connessione/Database.php';
require_once '../../models/Cart.php';
require_once '../../models/CartProduct.php';
require_once '../../models/User.php';
require_once '../../models/Product.php';

session_start();

if (!isset($_SESSION['current_user'])) {
    header("HTTP/1.1 401 Unauthorized");
    exit("Not Authorized");
}
$current_user = $_SESSION['current_user'];
$line_items = Cart::fetchAll($current_user);
$totale = 0;
?>

<html>
<head>
    <title>Carrello</title>
    <link rel="icon" href="../../partial/shopper.png">
    <link rel="stylesheet" href="../style/view_cart.css">
</head>
<body>
<?php include '../../partial/navbar.php';
foreach ($line_items as $line) {
    $product_id = $line->getProductId();
    $product = Product::Find_by_id($product_id);
    $quantita = $line->getQuantita();
    $prezzo = $product->getPrice();
    $prezzo_totale = $quantita * $prezzo; ?>
    <ul>
        <li><?php echo "Brand: " . $product->getBrand(); ?></li>
        <li><?php echo "Nome: " . $product->getName(); ?></li>
        <li><?php echo "Prezzo: " . $prezzo . "€"; ?></li>
        <li><?php echo "Quantità: " . $quantita; ?></li>
        <li><?php echo "Prezzo totale: " . $prezzo_totale . "€";
            $totale += $prezzo_totale; ?></li>
    </ul>
    <form action="../../actions/edit_cart.php" method="POST">
        <input type="number" name="quantita" value="<?php echo $quantita; ?>" min="0">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <input type="submit" value="submit">
    </form>
<?php } ?>
<p>Totale carrello: <?php echo $totale; ?>€</p>
</body>
</html>