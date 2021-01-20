<?php
    require_once("../conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>
<body>
    <form action="login2.php" method="post">
        <p>Usuario: <input type="text" name="usuario"></p>
        <p>Password: <input type="password" name="password"></p>
        <button type="submit"  name="login">LogIn</button>
    </form>
</body>
</html>