<?php 
if(isset($_REQUEST)){
$numeros = $_REQUEST;
$num_veces = random_int($numeros['nummin'], $numeros['nummax']);
$array = [];
for ($i=0; $i < $num_veces ; $i++) { 
    $array[$i] = random_int($numeros['valuemin'], $numeros['valuemax']);
}
$title = $_REQUEST['nompag'];
print_r($array);
} 
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?="<title>$title</title>" ?>
  </head>
  <body>
    <form action="" method="POST">
      <p>Número mínimo de valores: <input type="text" name="nummin"/></p>
      <p>Número máximo de valores: <input type="text" name="nummax"/></p>
      <p>Valor mínimo: <input type="text" name="valuemin"/></p>
      <p>Valor máximo: <input type="text" name="valuemax"/></p>
      <p>Nombre pag: <input type="text" name="nompag"  /></p>
      <p><input type="submit" value="Enviar" /></p>
    </form>
  </body>
</html>
