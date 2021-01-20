<?php

  require_once("../conexion.php");
  if(!isset($_GET['num'])){
    header("Location: ejercicio-02-01.php");
    exit();
  }
  
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Empresa - Centros - Departamentos - Empleados
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    table,th{
      border: 1px solid black;
    }
  </style>
</head>

<body>
  <h1>Listado de Empleados del Departamento</h1>

  <div>

    <!--  ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO -->
    <table>
      <thead>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Salario</th>
        <th>Hijos</th>
        <th>Nacionalidad</th>
      </thead>
      <tbody>

      <?php
      $resultado = $conexion->query("SELECT nombre,apellidos, salario, hijos, p.nacionalidad FROM empleados e INNER join paises p WHERE departamento = $_GET[num] and e.nacionalidad = p.id");
      while ($registro = $resultado->fetch_array()) {
        print "<tr>";
          print "<th>$registro[0]</th>";
          print "<th>$registro[1]</th>";
          print "<th>$registro[2]</th>";
          print "<th>$registro[3]</th>";
          print "<th>$registro[4]</th>";
          print "</tr>";
      }?>

      </tbody>
    </table>
    <p>
      <a href="ejercicio-02-01.php">Volver</a>
    </p>
  </div>
</body>
</html>
