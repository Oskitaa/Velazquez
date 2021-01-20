<?php 
    require_once('../conexion.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muestra usuarios</title>
</head>
<body>
    <table>
        <thead>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Fecha de alta</th>
        </thead>
        <tbody>
    <?php
        $resultado = $conexion->query('select login,rol,date FROM usuarios');
        while ($registro = $resultado->fetch()) {
            print "<tr>";
                print "<th>$registro[0]</th>";
                print "<th>$registro[1]</th>";
                print "<th>$registro[2]</th>";
            print "</tr>";
     }?>
     </tbody>
     </table>
     <form action="./creaUsuarioForm.php" method="post">
         <p><button type="submit" name="agregaUsuario">Agregar usuario</button></p>
     </form>
</body>
</html>