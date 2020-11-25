<?php
 session_start();
    if(isset($_SESSION['nombre'])){
        print ('<p>Existe</p>');
    }else {print ('<p>No existe</p>');}
?>

<a href="index.php">Home</a>
<a href="conextar.php">Conectar</a>
<a href="desconectar.php">Desconectar</a>
<a href="comprobar.php">Comprobar</a> 