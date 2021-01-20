<?php
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
</head>

<body>
  <h1>Centros</h1>

  <div>
    <?php
      if(isset($_GET['sinCentro'])){
        print "Debe seleccionar un centro";
      }
    ?>
    <form action="ejercicio-02-02.php" method="post">


      <!--  ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO -->
      <select name="centros">
        <option value="-1">Seleccione una opción</option>
        <?php
        $resultado = $conexion->query('select id,nombre FROM centros');
        while ($registro = $resultado->fetch_array()) {
            print "<option value=$registro[0]>$registro[1]</option>";
        }
        ?>
      </select>
      
      <button type="submit" name="btn_consult">Consultar</button>

    </form>
  </div>
</body>
</html>
