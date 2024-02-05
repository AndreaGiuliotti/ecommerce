<?php
require '../../models/Session.php';
require '../../models/Product.php';
require '../../models/User.php';
require '../../connessione/Database.php';

session_start();
if (empty($_SESSION['current_user']) || $_SESSION['current_user']->getRoleId() == 1) {
    header("HTTP/1.1 401 Unauthorized");
    exit("Not Authorized");
}
?>

<html>
<head>
    <title>Products</title>
    <link rel="icon" href="../../partial/admin.png">
    <link rel="stylesheet" href="../style/admin/home.css">
</head>
<body>
<?php include '../../partial/navbar.php'; ?>

<div class="products">
    <?php
    $products = Product::FetchAll();
    foreach ($products as $product) { ?>
        <form id="<?php echo $product->getId(); ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $product->getId(); ?>"
            <ul>
                <li> Marca : <input type="text" name="marca" placeholder="Marca"
                                    value="<?php echo $product->getBrand(); ?>"
                                    required>
                </li>
                <li> Nome : <input type="text" name="nome" placeholder="Nome" value="<?php echo $product->getName(); ?>"
                                   required></li>
                <li> Prezzo: <input type="number" name="prezzo" placeholder="Prezzo"
                                    value="<?php echo $product->getPrice(); ?>" step="0.01" min="0" required></li>

                <button type="submit" form="<?php echo $product->getId(); ?>"
                        formaction="../../actions/admin/edit_product.php">Modifica prodotto
                </button>
                <button type="submit" form="<?php echo $product->getId(); ?>"
                        formaction="../../actions/admin/delete_product.php">Rimuovi prodotto
                </button>
            </ul>
        </form>
    <?php } ?>
    <a class="button" href="http://localhost:63342/E-Commerce_V2/views/admin/add_product.php">Aggiungi prodotto</a>
</div>
</body>
</html>