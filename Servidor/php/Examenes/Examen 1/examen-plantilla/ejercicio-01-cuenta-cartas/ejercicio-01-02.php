<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Cuenta cartas
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    span{
      font-size: 7em;
    }
    
  </style>
</head>

<body>
  <h1>Cuenta cartas</h1>

<?php
  include_once("../funciones.php");

  $bien = true;
	if(isset($_POST['num_cartas']) && empty($_POST['num_cartas'])){ 
    print "No has escrito el numero de cartas";
    $bien = false;
  }
  if(!isset($_POST['paridad'])){
    print 'No has seleccionado paridad';
    $bien = false;
  }
  if($_POST['palo'] == -1){
    print 'No has seleccionado palo';
    $bien = false;
  }

  if($bien){
    $cartas = $_POST['num_cartas'];
    $palo = $_POST['palo'];
    $paridad = $_POST['paridad'];
    $array_cartas = [];
    $array_pares = [];
    switch ($palo) {
      case 'picas':
        creaCartas($cartas,$array_cartas,127137, 127146);
        $min_carta = 127137;
      break;
      case 'corazones':
        creaCartas($cartas,$array_cartas,127153, 127162);
        $min_carta = 127153;
      break;
      case 'diamantes':
        creaCartas($cartas,$array_cartas,127169, 127178);
        $min_carta = 127169;
      break;
      case 'trebol':
        creaCartas($cartas,$array_cartas,127185, 127194);
        $min_carta = 127185;
      break;   
    }


    
    print "<p>$cartas cartas del palo $palo</p>";
    foreach($array_cartas as $carta){
      print "<span>&#$carta</span>";
      if($paridad == "par"){
       if(($carta-$min_carta)%2!=0){
        array_push($array_pares,$carta);
       }}


       else{
        if(($carta-$min_carta)%2==0){
          array_push($array_pares,$carta);
         }
        }
    }

    
    print "<p>Hay ". count($array_pares) . " cartas $paridad del palo $palo</p>";
    sort($array_pares);
    foreach($array_pares as $carta){
      print "<span>&#$carta</span>";
    }
    
    $array_pares = array_unique($array_pares);
    print "<p>Hay ". count($array_pares) . " cartas $paridad distintas del palo $palo</p>";
    sort($array_pares);
    foreach($array_pares as $carta){
      print "<span>&#$carta</span>";
    }

  }

?>
  
</body>
</html>