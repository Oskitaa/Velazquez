<?php
    require_once("../conexion.php");

    $consulta = $conexion->prepare("Select password, rol from usuarios where login=?");
    $consulta->bindParam(1,$_POST['usuario']);
    $consulta->execute();
    while ($registro = $consulta->fetch()) {
        print "<p>".$registro[0]. ". ".$registro[1]."</p>";
    }
?>
