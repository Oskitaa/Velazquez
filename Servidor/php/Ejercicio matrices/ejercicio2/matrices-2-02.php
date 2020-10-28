<?php
/**
 * matrices-2-02.php
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
    Elimina valores repetidos.
    Matrices (2)
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Elimina valores repetidos</h1>

  <p>Actualice la página para mostrar un nuevo grupo de valores.</p>

<?php

for ($i=0; $i < rand(5,15); $i++) { 
  $bolas[$i] = rand(10102,10111);
}
print "<strong>Entre estas ".count($bolas)."...</strong><br>";

foreach($bolas as $bola){
  print "&#$bola";
}
$bolas = array_unique($bolas);
print "<br>";
print "<strong>... hay ".count($bolas)." bolas distintas.</strong><br>";
foreach($bolas as $bola){
  print "&#$bola";
}

?>

  <footer>
    <p>Óscar Carballar Bocanegra</p>
  </footer>
</body>
</html>
