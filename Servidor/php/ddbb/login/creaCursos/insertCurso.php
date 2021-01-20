<?php
    require_once('../conexion.php');
    if(!isset($_POST['aniadeCursoForm'])){
        Header("Location: creaCursoForm.php");
    }
    if(!isset($_POST['nuevoCurso']) || empty($_POST['nuevoCurso'])){
        Header("Location: creaCursoForm.php?errorVacio=true");
    } else{
        $consulta = $conexion->prepare("insert into cursos (nombre) values (?)");
        $consulta->bindParam(1,$_POST['nuevoCurso']);
        $consulta->execute();
        print ("<p>Curso añadido con exito</p>");
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
    <a href="./muestraCursos.php">Volver a inicio</a>
</body>
</html> 