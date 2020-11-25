<?php
    session_start();
    $nombre = 'Andres';
    setcookie("GenteMariquita", $nombre);
    $_SESSION['nombre'] = 'OScar';
?>

<a href="index.php">Home</a>
<a href="conextar.php">Conectar</a>
<a href="desconectar.php">Desconectar</a>
<a href="comprobar.php">Comprobar</a> 