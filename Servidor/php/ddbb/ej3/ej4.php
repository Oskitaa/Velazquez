<?php
$connect = new mysqli('remotemysql.com','QnqIgPTrhT','R0F1DlRY7k','QnqIgPTrhT');
if(isset($_POST['Aniadir'])){
    $consulta = $connect->stmt_init();
    $consulta->prepare("insert into alumnos (nombre, apellidos, email, codigo_curso) values (?,?,?,?)");
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $codigocurso = $_POST['codigo_curso'];
    $consulta->bind_param('sssi', $nombre, $apellidos, $email, $codigocurso);
    $consulta->execute();
    $consulta->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Alumnos</title>
    <style>
        a{
            text-decoration:none;
        }
        table,th,tr{
            border:1px solid black; 
        }
    </style>
</head>
<body>
    <table>
    <form action="" method="GET">
        <thead>
        <th><input type="submit" name="order" value="codigo"></th>
        <th><input type="submit" name="order" value="a.nombre"></th>
        <th><input type="submit" name="order" value="apellidos"></th>
        <th><input type="submit" name="order" value="email"></th>
        <th><input type="submit" name="order" value="codigo_Curso"></th>
        <th>Editar</th>
        <th>Borrar</th>
        </thead>
    </form>
    <tbody>
            <?php
            $tipo = "codigo";
            if(isset($_GET['order'])){
                $tipo = $_GET['order'];
            } 
            $resultado = $connect->query("SELECT a.codigo,a.nombre,a.apellidos,a.email, c.nombre
            FROM alumnos a
            INNER JOIN cursos c
            ON a.codigo_curso = c.codigo ORDER BY $tipo");
                $row = $resultado->fetch_all();        
                    foreach($row as $row2){
                        print('<tr>');
                            foreach ($row2 as $dato) { 
                                print('<th>');
                                print($dato);
                                print('</th>');
                            }
                            ?>
                            <form action="ej3-2.php" method="post">
                            <?php print('<th>');
                            print("<button type='submit' name='$row2[0]'>Editar</button>");
                            print('</th>');?>
                            </form>
                            <form action="" method="post">
                            <?php print('<th>');
                            print("<button type='submit' name='$row2[0]'>Borrar</button>");
                            print('</th>');?>
                            </form>
                        <?php
                        print('</th>');
                        print('</tr>');
                    }
                $resultado->free();
            ?>
</tbody> 
    </table>

    <button ><a href="ej3-2.php">Añadir persona</a></button>

</body>
</html>

<?php
$connect->close();
?>