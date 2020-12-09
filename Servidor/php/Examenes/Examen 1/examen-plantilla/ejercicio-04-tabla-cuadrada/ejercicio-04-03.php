<?php
session_start();
if(!isset($_POST['enviar'])){
  header("Location: ejercicio-04-01.html");
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Tabla cuadrada con casillas de verificación
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Tabla cuadrada con casillas de verificación</h1>
  <?php

  $total = $_SESSION['num']-1; 
  print "De una tabla de $total casillas has marcado ". (count($_POST)-1);
  print "<br>";
  if(count($_POST) != 1){
  print "Las casillas marcadas son: ";
  
  foreach (array_keys($_POST) as $t){
    if ($t == 'enviar') {
      return;
    }
    print $t ." ";
  }
}
  ?>
  </form>
</body> 
</html>