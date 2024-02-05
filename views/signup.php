<?php
?>

<html>
<head>
    <title>Sign up</title>
    <link rel="icon" href="../partial/shopper.png">
    <link rel="stylesheet" href="style/log&sign.css">
</head>
<body>
<form action="../actions/signup.php" method="post">
    <h2>Sign Up</h2>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password-confirmation" placeholder="Conferma Password" required>
    <input type="submit" value="Registrati">
</form>
</body>
</html>