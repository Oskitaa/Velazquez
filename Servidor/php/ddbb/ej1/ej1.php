<?php
$connect = new mysqli('remotemysql.com','QnqIgPTrhT','R0F1DlRY7k','QnqIgPTrhT');
if(isset($_POST['enviar'])){
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
    </style>
</head>
<body>
    <table>
    <form action="" method="GET">
        <thead>
        <th><input type="submit" name="order" value="Nombre"></th>
        <th><input type="submit" name="order" value="Apellidos"></th>
        <th><input type="submit" name="order" value="Email"></th>
        <th><input type="submit" name="order" value="Codigo Curso"></th>
        </thead>
    </form>
    <tbody>
            <?php
            $tipo = "codigo";
                if(isset($_GET['order'])){
                switch ($_GET['order']) {
                    case 'Nombre':
                        $tipo = "nombre";
                    break;
                    case 'Apellidos':
                        $tipo = "apellidos";
                    break;
                    case 'Email':
                        $tipo = "email";
                    break;
                    case 'Codigo Curso':
                        $tipo = "codigo_curso";
                    break;
                }
            } 
            $resultado = $connect->query("SELECT nombre,apellidos, email, codigo_curso from alumnos ORDER BY $tipo");
                $row = $resultado->fetch_all();        
                    foreach($row as $row2){
                        print('<tr>');
                            foreach ($row2 as $dato) { 
                                print('<th>');
                                print($dato);
                                print('</th>');
                            }
                        print('</tr>');
                    }
                $resultado->free();
            ?>
</tbody>

    </table>

    <button ><a href="ej1-2.php">Añadir persona</a></button>

</body>
</html>

<?php
$connect->close();
?>