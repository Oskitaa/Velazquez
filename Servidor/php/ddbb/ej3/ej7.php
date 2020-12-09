<?php
$connect = new mysqli('remotemysql.com','QnqIgPTrhT','R0F1DlRY7k','QnqIgPTrhT');
$resultado = $connect->query("SELECT c.codigo,c.nombre, count(*) FROM alumnos a INNER JOIN cursos c ON a.codigo_curso = c.codigo group by a.codigo_curso");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        while($row = $resultado->fetch_row()){
            print "<p>Nombre del curso: $row[1]</p>";
            print "<p>Inscritos: $row[2]</p>";
            $codigo_curso = $row[0];
            $resultado2 = $connect->query("SELECT nombre,apellidos from alumnos where codigo_curso=$codigo_curso");
            while ($row2 = $resultado2->fetch_row()){
                print "Nombre y apellidos: ".$row2[0] ." "º. $row2[1]."<br>";
            }
            $resultado2->close();
        }
    ?>
</body>
</html>

