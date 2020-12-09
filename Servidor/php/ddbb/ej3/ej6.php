<?php
$connect = new mysqli('remotemysql.com','QnqIgPTrhT','R0F1DlRY7k','QnqIgPTrhT');
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
        <th><input type="submit" name="order" value="id"></th>
        <th><input type="submit" name="order" value="nombre"></th>
        <th><input type="submit" name="order" value="apellidos"></th>
        <th><input type="submit" name="order" value="email"></th>
        <th><input type="submit" name="order" value="codigo_Curso"></th>
        <th>Editar</th>
        </thead>
    </form>
    <tbody>
            <?php
            $tipo = "codigo";
            if(isset($_GET['order'])){
                $tipo = $_GET['order'];
            } 
            $resultado = $connect->query("SELECT * from alumnos ORDER BY $tipo");
                $row = $resultado->fetch_all();        
                    foreach($row as $row2){
                        print('<tr>');
                            foreach ($row2 as $dato) { 
                                print('<th>');
                                print($dato);
                                print('</th>');
                            }
                            ?>
                            <form action="ej6-2.php" method="post">
                            <?php print('<th>');
                            print("<button type='submit' name='$row2[0]'>Editar</button>");
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
</body>
</html>

<?php
$connect->close();
?>