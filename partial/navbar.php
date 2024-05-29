<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgba(0,0,0,0.9);
            margin: 0;
            padding: 0;
        }

        .navbar {
            max-width: 800px;
            margin: 0 0;
            padding: 20px;
        }

        a {
            text-decoration: none;
            color: #333;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            display: inline-block;
        }

        a:hover {
            background-color: grey;
        }

        /* Style for logout link */
        a.button {
            color: rgba(0,0,0,0.8);
            background-color: rgba(255,215,0,0.85);
            font-weight: bold;
            border: 2px solid black;
        }

        a.button:hover {
            background-color: grey;
        }

        label {
            color: rgba(0,0,0,0.8);
            background-color: rgba(255,215,0,0.85);
            font-weight: bold;
            border: 2px solid black;
            padding: 10px 15px;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="navbar">
    <a class="button" href="http://localhost:63342/ecommerce/views/products/index.php">Home</a>
    <?php
    if (!empty($_SESSION['current_user'])) { ?>
        <a class="button" href="http://localhost:63342/ecommerce/actions/logout.php">Logout</a>
        <label><?php echo "Utente: " . $_SESSION['current_user']->getEmail(); ?></label>
        <?php
        if ($_SESSION['current_user']->getRoleId() == 2) {
            ?> <a class="button" href="http://localhost/ecommerce/views/admin/index.php">Admin</a>
            <?php
        }
    } else { ?>
        <a class="button" href="http://localhost/ecommerce/views/login.php">Login</a>
    <?php } ?>

</div>
</body>
</html>
