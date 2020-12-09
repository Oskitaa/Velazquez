<?php
  session_start();
  $dado_alto=0;
  $array_dados = [];
  
  if (!isset($_SESSION['dado_alto'])){$_SESSION['dado_alto'] = 0;}
  if(isset($_POST['empezar'])){
    $_SESSION['dado_alto'] = 5;
    $_SESSION['distinto'] = 0;
  }

  if (!isset($_SESSION['distinto'])){$_SESSION['distinto'] = 0;}
 
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Récord de dados
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Récord de dados</h1>

<form action="ejercicio-02-01.php" method="post">

  <?php
  if(isset($_POST['empezar']) || empty($_POST) ){
    for ($i=0; $i < 5; $i++) { 
      print "<img src=./img/1.svg >";
  } 
  }

  if(isset($_POST['tirar'])){
  for ($i=0; $i < 5; $i++) { 
    $dado_ran = rand(1,6);
    array_push($array_dados,$dado_ran);

    $dado_alto += $dado_ran;
    print "<img src=./img/".$dado_ran.".svg >";
} }

  if($dado_alto > $_SESSION['dado_alto']){
    $_SESSION['dado_alto'] = $dado_alto;
  }

  $array_dados = array_unique($array_dados);
  if(count($array_dados)== 5){
    $_SESSION['distinto']+=1;
  }


  ?>

   <p>Numero de veces que han salido todos los dados diferentes: <?php print(  $_SESSION['distinto'])?></p>
   <p>Puntuacion mas alta: <?php print(  $_SESSION['dado_alto'])?></p>
  <button type="submit" name="tirar" >Sacar de nuevo los dados</button>
  <button type="submit" name="empezar">Volver a empezar</button>
</form>

</body>
</html>