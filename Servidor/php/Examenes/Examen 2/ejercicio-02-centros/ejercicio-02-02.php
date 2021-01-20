<?php
  if(!isset($_POST['btn_consult'])){
    header("Location: ejercicio-02-01.php/?sinCentro=true");
    exit();
  }
  require_once("../conexion.php");

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
    table,th {
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
        <th>Nombre</th>
        <th>Presupuesto</th>
        <th>Numero de empleados</th>
      </thead>
      <tbody>
    <?php
        $resultado = $conexion->query("SELECT nombre, presupuesto, id from departamentos WHERE centro = $_POST[centros]");
        while ($registro = $resultado->fetch_array()) {
          print "<tr>";
            $resultado2 = $conexion->query("select COUNT(id) from empleados where departamento =$registro[2]");
            $registro2 = $resultado2->fetch_array();
            print "<th>$registro[0]</th>";
            print "<th>$registro[1]</th>";
            print "<th><a href=./ejercicio-02-03.php/?num=$registro[2]>$registro2[0]</a></th>";
            print "</tr>";
        }
        ?>
        </tbody>
    </table>
    
    <p>
      <a href="ejercicio-02-01.php">Volver</a>
    </p>
  </div>
</body>
</html>
