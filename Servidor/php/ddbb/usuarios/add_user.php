<?php
    $mysql = 'mysql:host=remotemysql.com;dbname=QnqIgPTrhT';
    $usuario = 'QnqIgPTrhT';
    $contrasena = 'R0F1DlRY7k';
    $conexion = new PDO($mysql, $usuario, $contrasena);
    if(isset($_POST['add'])){
        if(!isset($_POST['user']) || empty($_POST['user']) || strlen($_POST['user']) < 5 || strlen($_POST['user']) > 30){
            print "Debe poner un nombre de usuario correcto";
        }
        if(!isset($_POST['password']) || empty($_POST['password']) || strlen($_POST['password']) < 8 && strlen($_POST['password']) > 30 ){
            print "Debe poner una contraseña correcta";
        }
        if(!isset($_POST['rol']) || $_POST['rol'] == -1){
            print "Seleccione un rol";
        }
        
    $consulta = $conexion->prepare("insert into ususarios (login, password,rol) values (?,?,?,?)");
/*
    $consulta->bindParam(1,$_POST['user']);
    $consulta->bindParam(2,);
    $consulta->bindParam(3,);
    $consulta->bindParam(4,);

    $consulta->execute();
        */

    
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadi usuarioh</title>
</head>
<body>
    <form action="" method="POST">
        <p>Usuario: <input type="text" name="user"></p>
        <p>Contraseña: <input type="password" name="password"></p>
        <p><select name="rol">
            <option value="-1">Seleccione un rol</option>
            <?php
                $resultado = $conexion->query('select * FROM roles');
                while ($registro = $resultado->fetch()) {
                    print "<option value=$registro[0] >$registro[1]</option>";
                }
            ?>
        </select></p>
        <button type="submit" name="add">Añadir</button>
    </form>
</body>
</html>