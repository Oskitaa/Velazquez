<?php
/**
 * matrices-3-02.php
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
    Cuenta corazones.
    Matrices (3)
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Cuenta corazones</h1>

  <p>Actualice la página para mostrar un nuevo grupo de corazones.</p>

<?php

$num_tirada = rand(7,20);

for ($i=0; $i < $num_tirada; $i++) { 
  $emotes[$i] = rand(128147,128152);
}

print("<p><strong>$num_tirada corazones.</strong></p>");

print("<p>");
foreach($emotes as $emote){
  print("&#$emote");
}
print("</p><p><strong>Conteo</strong></p>");
$emotes = array_count_values($emotes);
foreach($emotes as $indice => $emote){
  print("<p>&#$indice $emote</p>");
}
?>

  <footer>
    <p>Óscar Carballar Bocanegra</p>
  </footer>
</body>
</html>
