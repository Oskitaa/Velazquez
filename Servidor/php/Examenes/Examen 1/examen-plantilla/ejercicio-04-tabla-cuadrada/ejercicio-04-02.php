<?php
session_start();
if(!isset($_POST) || empty($_POST) || $_POST['celdas'] <= 0){
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
  <style>
    table,th,tr{
      border:1px solid black;
    }
  </style>
</head>

<body>
  <h1>Tabla cuadrada con casillas de verificación</h1>
  <h3>Marque las casillas de verificación que quiera y contaré cuántas ha marcado.</h3>
  <form action="ejercicio-04-03.php" method="post">
  <!--  ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO -->
  <table>
  <?php
    $a = 1; 
    for ($i=0; $i < $_POST['celdas'] ; $i++) {   
      print "<tr>";
      for ($j=0; $j <  $_POST['celdas']; $j++) { 
        print "<th>";
        print "<p><input name=$a type='checkbox'>$a</p>";
        $a+=1;
        print "</th>";
      }
      print "</tr>";
    }
    
    $_SESSION['num'] = $a;
  ?>
</table>
    <button type="submit" name="enviar">Contar</button>
  </form>
</body> 
</html>