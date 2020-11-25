<?php

$errores = [
    !empty($_POST['nombre']),
    !empty($_POST['apellidos']),
    $_POST['edad'] != -1,
    isset($_POST['sexo']),
    isset($_POST['aficiones'])
];
$isValid = false;
if(array_sum($errores) == 5){
    $isValid = true;
print("<p>Su nombre es: {$_POST['nombre']}</p>");
print("<p>Su apellido es: {$_POST['apellidos']}</p>");
print("<p>Su edad es: {$_POST['edad']}</p>");
print("<p>Su sexo es: {$_POST['sexo']}</p>");
print("<p>Sus aficiones son:");
foreach($_POST['aficiones'] as $key){
    print($key.' ');
}   
print("</p>");
}else{
    print((array_sum($errores) ==1) ? 'Hay un error' : 'Hay '.(5-array_sum($errores)).' errores');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Datos personales</h1>
    <?php
    if(!$isValid){
    ?>
    <form action="" method="POST">
    <p>Nombre: <input type="text" name="nombre"></p>
    <p>Apellidos: <input type="text" name="apellidos"></p>
    <p>Edad:<select name="edad">
            <option value="-1">Seleccione su edad</option>
        <?php 
        for ($i=10; $i<91 ; $i++) { 
            print("<option value='$i'>$i</option>");
        }
        ?>
    </select></p>
    <label for="hombre">Hombre</label><input type="radio" value="hombre" name="sexo" id="hombre">
    <p><label for="mujer">Mujer</label><input type="radio" value="mujer" name="sexo" id="mujer"></p>
    Musica<input type="checkbox" value="musica" name="aficiones[]">
    Deporte<input type="checkbox" value="deporte" name="aficiones[]">
    cine<input type="checkbox" value="cine" name="aficiones[]">
    Lectura<input type="checkbox" value="lectura" name="aficiones[]">
    Videojuegos<input type="checkbox" value="videojuegos" name="aficiones[]">
    Viajes<input type="checkbox" value="viajes" name="aficiones[]">
    <button>Enviar</button>
    </form>
    <?php
    }else{

    }
    ?>
</body>
</html>