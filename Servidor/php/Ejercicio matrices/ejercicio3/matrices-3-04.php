<?php
/**
 * matrices-3-04.php
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
    Ordenar cartas.
    Matrices (3)
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
  span{
    font-size:4em;
  }
    </style>
</head>

<body>
  <h1>Ordenar cartas</h1>

  <p>Actualice la página para mostrar una nueva mano.</p>

<?php

$num_tirada = rand(5,10);

for ($i=0; $i < $num_tirada; $i++) { 
  $emotes[$i] = rand(127169,127173);
}

print("<p><strong>Mano de $num_tirada cartas</strong></p>");

print("<p>");
foreach($emotes as $emote){
  print("<span>&#$emote </span>");
}
print("</p><p><strong>Cartas distintas obtenidas</strong></p>");

$carta_unica = array_unique($emotes);
sort($carta_unica);
foreach($carta_unica as$emote){
  print("<span>&#$emote </span>");
}

print("<p><strong>Número de cartas obtenidas (sin ordenar)</strong></p>");
$carta_obtenida = array_count_values($emotes);
foreach($carta_obtenida as $indice => $emote){
  print("<span> $emote&#$indice - </span>");
}

print("<p><strong>Número de cartas obtenidas (ordenadas)</strong></p>");
arsort($carta_obtenida);


foreach($carta_obtenida as $indice => $emote){
  print("<span> $emote &#$indice - </span>");
}

?>

  <footer>
    <p>Óscar Carballar Bocanegra</p>
  </footer>
</body>
</html>
