<?php
/**
 * matrices-3-03.php
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
    Ordenar dados.
    Matrices (3). Sin formularios.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Ordenar dados</h1>

  <p>Actualice la página para mostrar una nueva tirada.</p>

<?php

$dados_ramdom = [];
$num_tirada =  rand(2,7);

for ($i=0; $i < $num_tirada; $i++) { 
  $dados_ramdom[$i] = rand(1,6);
}

print("<p><strong>Tirada de $num_tirada dados</strong></p>");
foreach($dados_ramdom as $dado){
  print(" <img src=\"../ejercicio1/img/$dado.svg\">");
}

print("<p><strong>Tirada ordenada</strong></p>");
sort($dados_ramdom);
foreach($dados_ramdom as $dado){
  print(" <img src=\"../ejercicio1/img/$dado.svg\">");
}

?>

  <footer>
    <p>Óscar Carballar Bocanegra</p>
  </footer>
</body>
</html>
