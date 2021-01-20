<?php
session_start();

if(!isset($_SESSION['vecesJugado']) || !isset($_SESSION['win1']) || !isset($_SESSION['win2'])){
  $_SESSION['vecesJugado'] = 0;
  $_SESSION['win2'] = 0;
  $_SESSION['win1'] = 0;
}

$player1 = array();
$player2 = array();

for ($i=1; $i < 7 ; $i++) { 
  array_push($player1, rand(1,6));
  array_push($player2, rand(1,6));
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Seis dados
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Seis dados</h1>
    

    <!--  ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO -->
    <p>Dados del jugador 1</p>

    <?php 
      
      foreach ($player1 as $v) {
        print "<img src=./img/$v.svg>";
      }  
      unset($player1[array_search(min($player1),$player1)]);
      unset($player1[array_search(max($player1),$player1)]);
    ?>
  
    <p>Dados del jugador 2</p>

    <?php 
      foreach ($player2 as $v) {
        print "<img src=./img/$v.svg>";
      }  
      unset($player2[array_search(min($player2),$player2)]);
      unset($player2[array_search(max($player2),$player2)]);
      print "<br>";
      if(array_sum($player1) > array_sum($player2)) {
       $_SESSION['win1']+=1 ;
       print "El jugador 1 ha ganado.";
      }
      elseif (array_sum($player1) < array_sum($player2)){
        $_SESSION['win2']+=1 ;
        print "El jugador 2 ha ganado.";
      }
      else
         print("Han empatado");
      $_SESSION['vecesJugado']+=1;

    ?>

    <p>Puntuacion del jugador 1 tras quitar el dado con puntuacion mas alta y mas baja: <?php print array_sum($player1)?></p>

    <p>Puntuacion del jugador 2 tras quitar el dado con puntuacion mas alta y mas baja: <?php print array_sum($player2)?></p>

      <h2>Resumen</h2>
      <p>Numero de veces que han jugado: <?php print $_SESSION['vecesJugado']?></p>
      <p>Numero de veces que ha ganado el jugador 1: <?php print $_SESSION['win1']?></p>
      <p>Numero de veces que ha ganado el jugador 2: <?php print $_SESSION['win2']?></p>
</body>
</html>
