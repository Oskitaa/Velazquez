<?php
require_once('../conexion.php');
print (compareHas("123456","10$614b8e510efc167704a728634b1a7f5f"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muestra Alumnos</title>
</head>
<body>
    
    <?php
        $resultado = $conexion->query('SELECT a.nombre,a.apellidos,a.email, c.nombre FROM alumnos a INNER JOIN cursos c ON a.codigo_curso = c.codigo');
        
        while ($registro = $resultado->fetch()) {
            print "<p>".$registro[0]. " ".$registro[1]." ".$registro[2]." ".$registro[3]."</p>";
        }
    ?>
    <form action="./creaAlumnoForm.php" method="post">
        <button type="submit" name="agregarAlumno">Agregar Alumno</button>
    </form>
     
       

</body>
</html>

<?php
?>