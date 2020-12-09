<?php 
$mysql = 'mysql:host=remotemysql.com;dbname=QnqIgPTrhT';
$usuario = 'QnqIgPTrhT';
$contrasena = 'R0F1DlRY7k';
$conexion = new PDO($mysql, $usuario, $contrasena);

if(isset($_GET['Buscar'])){
    if(empty($_GET['email']) && empty($_GET['correo'])){
        print "<h1>Introduce al menos un campo</h1>";
        print "<button><a href=ej2.php>Volver</a></button>";
        exit();
    }
    if(isset($_GET['email']) && !empty($_GET['email'])){
        $resultado = $conexion->prepare('select * FROM alumnos WHERE email like ?');
        $resultado->execute(["%".$_GET['email']."%"]);
        $datos = $resultado->fetchAll(PDO::FETCH_NUM);
    }

    if(isset($_GET['nombre']) && !empty($_GET['nombre'])){
        $resultado = $conexion->prepare('select * FROM alumnos WHERE nombre like ?');
        $resultado->execute(["%".$_GET['nombre']."%"]);
        $datos = $resultado->fetchAll(PDO::FETCH_NUM);
    }

    if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['nombre']) && !empty($_GET['nombre'])){
        $resultado = $conexion->prepare('select * FROM alumnos WHERE email like ? and nombre like ?');
        $resultado->execute([("%".$_GET['email']."%"),("%".$_GET['nombre']."%")]);
        $datos = $resultado->fetchAll(PDO::FETCH_NUM);
    }

    if(empty($datos)){
        print "<h1>No se ha encontrado a nadie con esos datos.</h1>";
        print "<button><a href=ej2.php>Volver</a></button>";
        exit();
    }
}

if(isset($_GET['Borrar'])){
    $resultado = $conexion->prepare('DELETE FROM alumnos WHERE email = ? AND nombre = ?');
    $resultado->bindParam(1,$_GET['email']);
    $resultado->bindParam(2,$_GET['nombre']);
    $resultado->execute();
    header("Location: ej2.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listaoh</title>
    <style>
    table,th,tr{
        border:1px solid black;
    }
    </style>
</head>
<body>
    <table>
    <thead>
        <th>Id</th>
        <th>nombre</th>
        <th>apellidos</th>
        <th>email</th>
        <th>codigo curso</th>
    </thead>
    <tbody>
    <?php
         foreach ($datos as $row) { 
            print('<tr>');
             foreach($row as $dato){
                print('<th>');
                print($dato);
                print('</th>');     
             }        
             print('<tr>');
            }
        ?>
    </tbody>
    </table>
</body>
</html>