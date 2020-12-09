<?php
  include_once("../funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Obtener productos
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Obtener productos</h1>
  <form action="" method="post">
  <select name="productos[]" multiple>
    <option value="Televisor">Televisor</option>
    <?php
    $ar = obtenerDatos($datos);
    foreach($ar as $h){
      print "<option value=$h>$h</option>";
    }
    ?>
  </select>

  <p>Seleccione una informacion adicional</p>
  <p><input type="radio" name="adicional" value="precio" >Precio</p>
  <p><input type="radio" name="adicional" value="stock" >Stock</p>
  <p><input type="radio" name="adicional" value="marca" >Marca</p>
  <p><input type="radio" name="adicional" value="actualizacion">Fecha ultima edicion</p>

  <button type="submit" name="enviar">enviar</button>
  </form>

  
<?php
if(count($_POST) >1){
print "<h1>Obtener productos</h1>";
print "<p><strong>Listado de productos seleccionados</strong></p>";
if(isset($_POST["productos"])){$codigos = $_POST["productos"];}
if(isset($_POST["adicional"])){$adicional = $_POST["adicional"];}
if(count($_POST) == 2){
$ar = obtenerDatos($datos,$codigos);
$nombrees = ["Codigo","Nombre"];
}else{
  $nombrees = ["Codigo","Nombre",$adicional];
  $ar = obtenerDatos($datos,$codigos,$adicional);
}


foreach($ar as $a){
  $i = 0;
  foreach($a as $b){
    print  $nombrees[$i]. " : " . $b. " ";
    $i+=1;
  }
  print "<br>";
}

  
}else{
  print "<p>No ha enviado nada.</p>";
}
?>

</body>
</html>