<?php
/**
 * matrices-1-03.php
 *
 * @author Escriba aquí su nombre
 *
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Nombres de animales.
    Matrices (1)
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Nombres de animales</h1>

  <p>Actualice la página para mostrar un nuevo animal.</p>

<?php

$imagenes = scandir("./img/animales");
$num_ramdon = rand(2,count($imagenes)-1);
$nombre_animal = explode(".",$imagenes[$num_ramdon]);
$nombre_animal[0] = str_replace("-"," ", $nombre_animal[0]);
print "<p><strong>".strtoupper($nombre_animal[0])."</strong></p>";
print"<img src=\"./img/animales/$imagenes[$num_ramdon]\">";

?>

  <footer>
    <p>Óscar Carballar Bocanegra</p>
  </footer>
</body>
</html>

