<?php
/**
 * matrices-3-01.php
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
    Busca emoticono.
    Matrices (3)
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  p{
    font-size: 30px;
  }
    </style>
</head>

<body>
  <h1>Busca emoticono</h1>

  <span>Actualice la página para mostrar un nuevo grupo de emoticonos.</span>

<?php

$num_tirada = rand(10,20);
$emote_rand =  rand(128512,128580);
$isEmote = false;
for ($i=0; $i < $num_tirada; $i++) { 
  $emotes[$i] = rand(128512,128580);
}
print("<p>");
foreach($emotes as $emote){
  print("&#$emote");
}
print("</p>");
foreach($emotes as $emote){
  if($emote == $emote_rand){
    $isEmote =true;
  }
}
print("<p>El emoticono &#$emote_rand " . (($isEmote) ? "si" : "no") . " está entre ellos.</p>");

?>

  <footer>
    <span>Óscar Carballar Bocanegra</span>
  </footer>
</body>
</html>
