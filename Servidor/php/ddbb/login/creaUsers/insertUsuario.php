<?php
    require_once('../conexion.php'); 
    $header = "";
    $entra= false;
    if(isset($_POST['add'])){
        if(!isset($_POST['user']) || empty($_POST['user']) || strlen($_POST['user']) < 5 || strlen($_POST['user']) > 30){
            $entra= true;
            $header .= "&userIncorrect=true";
        }
        if(!isset($_POST['password']) || empty($_POST['password']) || strlen($_POST['password']) < 8 && strlen($_POST['password']) > 30 ){
            $entra= true;
            $header .= "&passwordIncorrect=true";
        }
        if(!isset($_POST['rol']) || $_POST['rol'] == -1){
            $entra= true;
            $header .= "&rolIncorrect=true";
        }
        if($entra){
            header("Location: creaUsuarioForm.php?".$header,false,307);
            exit();
         }
    } else {
        Header("Location: creaUsuarioForm.php");
    }

    $consulta = $conexion->prepare("insert into usuarios (login, password,rol,date) values (?,?,?,?)");
    
    $user = $_POST['user'];
    $pass = encrypPassword(10,$_POST['password']);
    $rol = $_POST['rol'];
    $date = date("Y-m-d H:i:s");

    $consulta->bindParam(1,$user);
    $consulta->bindParam(2,$pass);
    $consulta->bindParam(3,$rol);
    $consulta->bindParam(4,$date);

    $consulta->execute();

    if($consulta->errorInfo()[1] == 1062){
        Header("Location: creaUsuarioForm.php?duplicateUsername=true");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserta Usuario</title>
</head>
<body>
    <p>Ingresado correctamente</p>
    <a href="./muestraUsers.php">Volver</a>
</body>
</html>