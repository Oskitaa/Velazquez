<?php
session_start();
$_SESSION['contador'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ej1-1.php" method="post">
    <input type="submit" value="BAJAR" name='bajar'><?=$_SESSION['contador']?><input type="submit" value="SUBIR" name='subir'> 
    <p><input type="submit" value="PONER A CERO" name='cero'></p>
    </form>
</body>
</html>