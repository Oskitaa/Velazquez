<?php
/**
 * matrices-1-01.php
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
    Dado.
    Matrices (1).
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Dado</h1>

  <p>Actualice la página para mostrar una nueva tirada.</p>

<?php

$numeros = ["","uno","dos","tres","cuatro","cinco","seis",];
$num_ramdon = rand(1,6);

print(" <img src=\"./img/$num_ramdon.svg\">");
print("<p>Has sacado uno  <strong>$numeros[$num_ramdon]</strong></p>");

?>
  
  <footer>
    <p>Óscar Carballar Bocanegra</p>
  </footer>
</body>
</html>
