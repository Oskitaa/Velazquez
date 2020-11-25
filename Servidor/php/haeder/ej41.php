<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ej42.php" method="POST">
        
        <?php
        print("<p>Nombre: <input type='text' name='nombre' value=$_REQUEST[nombre]></p>");
        print((empty($_REQUEST['nombre']) ? "Nombre incorrecto." :""));
        print("<p>estatura: <input type='text' name='estatura' value=$_REQUEST[estatura]></p>");
        print(!(isset($_REQUEST['estatura'])) || !($_REQUEST['estatura'] >= 70 && $_REQUEST['estatura'] <=250) ? "Estatura incorrecta." :"");
        ?>
        <button>Enviar</button>
    </form>
</body>
</html>