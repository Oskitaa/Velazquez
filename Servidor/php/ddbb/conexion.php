<?php
$connect = new mysqli('localhost','root','','ejemplo');
print ($connect->server_info);
$connect->query("INSERT into alumnos(nombre,apellidos,email,codigocurso) VALUES ('Test','Test','test',1)");
$connect->close();
?>