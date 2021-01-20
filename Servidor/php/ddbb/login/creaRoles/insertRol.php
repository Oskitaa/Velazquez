<?php
    require_once('../conexion.php');
    if(!isset($_POST['aniadeRolForm'])){
        Header("Location: creaRolForm.php");
    }
    if(!isset($_POST['nuevoRol']) || empty($_POST['nuevoRol'])){
        Header("Location: creaRolForm.php?errorVacio=true");
    } else{
        $consulta = $conexion->prepare("insert into roles (nombre) values (?)");
        $consulta->bindParam(1,$_POST['nuevoRol']);
        $consulta->execute();
        print ("<p>Rola añadido con exito</p>");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porfin se añade</title>
</head>
<body>
    <a href="./muestraRol.php">Volver a inicio</a>
</body>
</html> 