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
</div>
</body>
</html>
