<?php
    $mysql = 'mysql:host=localhost;dbname=dwes_dic2020';
    $usuario = 'root';
    $contrasena = '';
    $conexion2 = new PDO($mysql, $usuario, $contrasena);
    $conexion = new mysqli("localhost","root","","dwes_dic2020");
?>