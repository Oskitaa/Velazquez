<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method='POST'>
        <p>Numero 1:<input type="text" name="dato1"></p>
        <p>Numero 2:<input type="text" name="dato2"></p>

        <input type="radio" name="op" value="suma">Suma
        <input type="radio" name="op" value="resta">Resta
        <input type="radio" name="op" value="multiplicacion">Multiplicacion
        <input type="radio" name="op" value="division">Division

        <p><button>Enviar</button></p>
    
    </form>
</body>
</html>

<?php



function operaciones($dato1,$dato2,$op="suma"){
    $opera =
     ["suma" => ($dato1 + $dato2),
    'resta' => ($dato1 - $dato2),
    'multiplicacion' => ($dato1 * $dato2),
    'division' => ($dato1 / $dato2)];

    return $opera[$op];
}

$dalida = operaciones($_POST['dato1'],$_POST['dato2'],(isset($_POST['op']) ) ?  $_POST['op']:"suma");
print($dalida);
?>