<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Encuesta</h1>
    <p>Escriba el enunciado de cada una de las preguntas.</p>
    <form action="ej2-3.php" method='POST'>
        <?php
            session_start();
            $_SESSION['req'] = $_POST['req'];
            $_SESSION['res'] = $_POST['res'];
            for ($i=1; $i <=$_SESSION['req']; $i++) { 
                print("<p>Pregunta $i: <input type='text' name='pregunta$i'></p>");
            }
        ?>
        <p><input type="submit" value="Generar"></p>
    </form>
</body>
</html>