<?php
    require_once('../conexion.php'); 
    $header = "";
    $entra= false;
    if(isset($_POST['add'])){
        if(!isset($_POST['nombre']) || empty($_POST['nombre']) || strlen($_POST['nombre']) < 5 || strlen($_POST['nombre']) > 30){
            $entra= true;
            $header .= "&nombreIncorrect=true";
        }
        if(!isset($_POST['apellidos']) || empty($_POST['apellidos']) || strlen($_POST['apellidos']) < 5 || strlen($_POST['apellidos']) > 150){
            $entra= true;
            $header .= "&apellidosIncorrect=true";
        }
        if(!isset($_POST['email']) || empty($_POST['email']) || strlen($_POST['email']) < 5 || strlen($_POST['email']) > 50){
            $entra= true;
            $header .= "&emailIncorrect=true";
        }
        if(!isset($_POST['codigo_curso']) || $_POST['codigo_curso'] == -1){
            $entra= true;
            $header .= "&cursoIncorrect=true";
        }
        if($entra){
            header("Location: creaAlumnoForm.php?".$header,false,307);
            exit();
         }
    } else {
        Header("Location: creaAlumnoForm.php");
    }

    $consulta = $conexion->prepare("insert into alumnos (nombre,apellidos,email,codigo_curso) values (?,?,?,?)");

    $consulta->bindParam(1,$_POST['nombre']);
    $consulta->bindParam(2,$_POST['apellidos']);
    $consulta->bindParam(3,$_POST['email']);
    $consulta->bindParam(4,$_POST['codigo_curso']);

    $consulta->execute();

    print_r($consulta->errorInfo());

    if($consulta->errorInfo()[1] == 1062){
        Header("Location: creaUsuarioForm.php?duplicateUsername=true");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserta Alumno</title>
</head>
<body>
    <p>Ingresado correctamente</p>
    <a href="./muestraAlumnos.php">Volver</a>
</body>
</html>