
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir persona</title>
</head>
<body>

    <?php 
    $tipo = 'Aniadir';
    $enviar =$_SERVER['HTTP_REFERER'];
    $connect = new mysqli('remotemysql.com','QnqIgPTrhT','R0F1DlRY7k','QnqIgPTrhT');
    if(isset($_POST) && !empty($_POST)){
        
        session_start();
        if(isset($_POST['Editar'])){
            $consulta = $connect->stmt_init();
            $consulta->prepare("UPDATE alumnos SET nombre=?,apellidos=?,email=?,codigo_curso=? WHERE codigo=?");
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $codigocurso = $_POST['codigo_curso'];
            $id2 = $_SESSION['id'];
            print_r($consulta);
            print($nombre. $apellidos. $email. $codigocurso.$id2);
            $consulta->bind_param('sssii', $nombre, $apellidos, $email, $codigocurso,$id2);
            $consulta->execute();
            $consulta->close();
            header("Location: ej3.php");
            exit();
        }
        $_SESSION['id'] = array_keys($_POST)[0];
        $tipo = 'Editar';
        
        $resultado = $connect->query("SELECT * from alumnos WHERE codigo=$_SESSION[id]");
        $row = $resultado->fetch_row();
        $enviar = "";
    }
    
    ?>

    <form action="<?php print $enviar?>" method="post">
        <p>Nombre: <input type="text" name="nombre" <?php if(isset($row)) print("value='$row[1]'")?> ></p>
        <p>Apellidos: <input type="text" name="apellidos"  <?php if(isset($row)) print("value='$row[2]'")?> ></p>
        <p>Email: <input type="text" name="email" <?php if(isset($row)) print("value='$row[3]'")?> ></p>


        <p>Codigo curso: <input type="text" name="codigo_curso"  <?php if(isset($row)) print("value='$row[4]'")?> ></p>

        <?php
                print "<select name='codigo_curso'>";
                print "<option value='-1'>Seleccione un curso</option>";
                $resultado2 = $connect->query("SELECT * from cursos ");
                while($row2 = $resultado2->fetch_row()){
                    print "<option value=".$row2[0];
                    if(isset($row) && ($row[4]==$row2[0])){
                        print " selected";
                    }
                    print ">".$row2[1]."</option>";
                }
                print "</select>";
        ?>  

        <button type="submit" name=<?php print $tipo?> > <?php print $tipo?> </button>
    </form>
</body>
</html>



