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
</head>

<body>
  <h1>Editar Departamento</h1>

  <div>


      <!--  ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO -->
      <form action="./ejercicio-03-03.php/?<?php print $_GET['num']?>">
        <?php
          $resultado = $conexion2->prepare("SELECT d.nombre,presupuesto,c.nombre,centro FROM departamentos d inner join centros c WHERE d.id = ?");
          $resultado->bindParam(1,$_GET['num']);
          $resultado->execute();
          $registro = $resultado->fetch();
          ?>

        <p>Nombre: <input type="text" value=<?php print $registro[0]?> readonly></p>
        <p>Presupuesto: <input type="text" name="presupuesto" value=<?php print $registro[1]?>></p>
        <p>Centro <select name="centros">
        <?php 
          $resultado = $conexion2->query("select id,nombre FROM centros");
          while ($registro2 = $resultado->fetch()) {
            $selected = "";
            if($registro[3] == $registro2[0]){
              $selected = "selected";
            }
            print "<option value=$registro2[0] $selected>$registro2[1]</option>";
          }
        ?>
        </select></p>

        
          <button type="submit">Guardar</button>
      </form>
    <p>
      <a href="ejercicio-03-01.php">Volver</a>
    </p>
  </div>
</body>
</html>
