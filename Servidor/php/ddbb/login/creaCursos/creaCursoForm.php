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
    elseif(!isset($_POST['agregarCurso'])){
        Header("Location: muestraCursos.php");
    }
?>
    <form action="insertCurso.php" method="post">
        <p>Nombre del Curso: <input type="text" name="nuevoCurso"></p>
        <button type="submit" name="aniadeCursoForm">Añadir Curso</button>
    </form>
</body> 
</html>