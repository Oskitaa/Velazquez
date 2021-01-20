<?php require_once('../conexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Rol</title>
</head>
<body>
<?php
    if(isset($_GET['errorVacio'])){
        print("<p>El campo debe contener caracteres.</p>");
    }
    elseif(!isset($_POST['agregarRol'])){
        Header("Location: muestraRol.php");
    }
?>
    <form action="insertRol.php" method="post">
        <p>Nombre del Rol: <input type="text" name="nuevoRol"></p>
        <button type="submit" name="aniadeRolForm">Añadir Rol</button>
    </form>
</body> 
</html>