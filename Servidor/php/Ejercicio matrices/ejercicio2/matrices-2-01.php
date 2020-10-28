<?php
/**
 * matrices-2-01.php
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
    Elimina un valor.
    Matrices (2)
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Elimina un valor</h1>

  <p>Actualice la página para mostrar una nueva tirada.</p>

<?php

$dados_ramdom = [];
$num_ramdon = rand(1,6);
$num_tirada =  rand(1,10);

for ($i=0; $i < $num_tirada; $i++) { 
  $dados_ramdom[$i] = rand(1,6);
}

print("<p><strong>Tirada de $num_tirada dados</strong></p>");
foreach($dados_ramdom as $dado){
  print(" <img src=\"./img/$dado.svg\">");
}

print("<p><strong>Dado a eliminar</strong></p>");

$dado_eliminar = $dados_ramdom[rand(0,count($dados_ramdom)-1)];
print(" <img src=\"./img/$dado_eliminar.svg\">");

print("<p><strong>Dados restantes</strong></p>");

$dado_total = count($dados_ramdom);

for ($i=0; $i <= $dado_total; $i++) { 
  if($dados_ramdom[$i] == $dado_eliminar){
  unset($dados_ramdom[$i]);
  }
}

foreach($dados_ramdom as $dado){
  print(" <img src=\"./img/$dado.svg\">");
}

?>
  <footer>
    <p>Óscar Carballar Bocanegra</p>
  </footer>
</body>
</html>
