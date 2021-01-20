<?php
  require_once("../conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Empresa - Departamentos
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    table,th{
      border:1px solid black;
    }
  </style>
</head>

<body>
  <h1>Listado de Departamentos</h1>

  <div>
    
  <!--  ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO -->
  <table>
    <thead>
      <th><a href="./ejercicio-03-01.php/?ordenar=d.nombre">Departamento</a></th>
      <th><a href="./ejercicio-03-01.php/?ordenar=d.presupuesto">Presupuesto</a></th>
      <th><a href="./ejercicio-03-01.php/?ordenar=c.nombre">Centro</a></th>
    </thead>
    <tbody>
    <?php
      $ordenar = "c.nombre, d.nombre";
      if(isset($_GET["ordenar"])){
        $ordenar = $_GET["ordenar"];
      }
      $resultado = $conexion2->query("SELECT d.nombre,d.presupuesto,c.nombre,d.id FROM departamentos d inner join centros c where d.centro = c.id ORDER by $ordenar");
      while ($registro = $resultado->fetch()) {
        print "<tr>";
          print "<th><a href=./ejercicio-03-02.php/?num=$registro[3]>$registro[0]</a></th>";
          print "<th>$registro[1]</th>";
          print "<th>$registro[2]</th>";
          print "</tr>";
      }
      ?>
    </tbody>
  </table>
  </div>
</body>
</html>
