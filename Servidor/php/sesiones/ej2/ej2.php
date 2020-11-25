<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Encuesta</h1>
    <p>Escribe un numero de preguntas entre 1 y 10,y el número de respuestas entre 2 y 10 que tendrá la encuesta de valoración.</p>
    <form action="ej2-2.php" method='POST'>
        <p>Número de preguntas:<input type="number" min="1" max="10" name="req"></p>
        <p>Nímero de respuestas:<input type="number" min="2" max="10" name="res"></p>
        <p><input type="submit" value="Mostar"></p>
    </form>
</body>
</html>