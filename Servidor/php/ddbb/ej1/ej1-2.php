<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir persona</title>
</head>
<body>
    <form action="<?=$_SERVER['HTTP_REFERER']?>" method="post">
    
    <p>Nombre: <input type="text" name="nombre"></p>
    <p>Apellidos: <input type="text" name="apellidos"></p>
    <p>Email: <input type="text" name="email"></p>
    <p>Codigo curso: <input type="text" name="codigo_curso"></p>
    <button type="submit" name="enviar">Añadir</button>
    </form>
</body>
</html>