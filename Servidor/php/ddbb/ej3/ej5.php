<?php
$connect = new mysqli('remotemysql.com','QnqIgPTrhT','R0F1DlRY7k','QnqIgPTrhT');
$resultado = $connect->query("SELECT count(codigo) FROM alumnos");
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
        $row2 = $resultado->fetch_row();
        print("<p>Hay  $row2[0]</p>");
        print "<a href='./ej4.php'>Ver Listado</a>"
    ?>
    
</body>
</html>