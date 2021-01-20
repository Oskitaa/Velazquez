<?php
    require_once('../conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muestra Rol</title>
</head>
<body>
    <?php
     $resultado = $conexion->query('select * FROM roles');
     while ($registro = $resultado->fetch()) {
         print "<p>".$registro[0]. ". ".$registro[1]."</p>";
     }?>
    <form action="./creaRolForm.php" method="post">
        <button type="submit" name="agregarRol">Agregar Rol</button>
    </form>
</body>
</html>