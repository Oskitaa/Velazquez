<?php
    $mysql = 'mysql:host=remotemysql.com;dbname=QnqIgPTrhT';
    $usuario = 'QnqIgPTrhT';
    $contrasena = 'R0F1DlRY7k';
    $conexion = new PDO($mysql, $usuario, $contrasena);

    function encrypPassword($num,$pass){
        for ($i=0; $i <= $num ; $i++) { 
            $pass = md5($pass);
        }
        return "$num$".$pass;
    }

    function compareHas($pass,$passEncrypted){
        $num = explode('$', $passEncrypted)[0];
        $pass = encrypPassword($num, $pass);
        return ($pass == $passEncrypted);
    }
?>