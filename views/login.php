<?php
?>

<html>
<head>
    <title>Login</title>
    <link rel="icon" href="../partial/shopper.png">
    <link rel="stylesheet" href="style/log&sign.css">
</head>
<body>
<div id="container">
    <form action="../actions/login.php" method="post">
        <h2>Login</h2>
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Entra">
    </form>
    <a href="http://localhost:63342/E-Commerce_V2/views/products/index.php">
        <button type="button">Continua senza autenticazione</button>
    </a>
</div>
</body>
</html>