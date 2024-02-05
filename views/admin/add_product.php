<?php
require '../../models/Session.php';
require '../../models/Product.php';
require '../../models/User.php';
require '../../connessione/Database.php';

session_start();
if (empty($_SESSION['current_user']) || $_SESSION['current_user']->getRoleId() == 1) {
    header("HTTP/1.1 401 Unauthorized");
    exit("Not Authorized");
} ?>

<html>
<head>
    <title>Aggiungi prodotto</title>
    <link rel="icon" href="../../partial/admin.png">
    <link rel="stylesheet" href="../style/admin/add_product.css">
</head>
<body>
<?php include '../../partial/navbar.php'; ?>
<div class="products">
    <form action="../../actions/admin/add_product.php" method="POST">
        <ul>
            <li>Marca : <input type="text" name="marca" placeholder="Marca" required></li>
            <li>Nome : <input type="text" name="nome" placeholder="Nome" required></li>
            <li>Prezzo : <input type="number" name="prezzo" placeholder="Prezzo" step="0.01" required></li>
            <input type="submit" value="Aggiungi">
        </ul>
    </form>
</div>
</body>
</html>