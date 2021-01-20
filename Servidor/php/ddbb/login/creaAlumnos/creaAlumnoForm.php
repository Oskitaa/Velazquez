<?php
    require_once('../conexion.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir8 Alumno</title>
</head>
<body>


<form action="insertAlumno.php" method="post">
        <p>Nombre: <input type="text" name="nombre" value=<?php if(!empty($_POST['nombre'])){print $_POST['nombre'];}?>></p>
        <?php if(isset($_GET['nombreIncorrect'])) print " Debe poner un nombre correcto.<br>"?>
        <p>Apellidos: <input type="text" name="apellidos" value=<?php if(!empty($_POST['apellidos'])){print $_POST['apellidos'];}?>></p>
        <?php if(isset($_GET['apellidosIncorrect'])) print " Debe poner un apellido correcto.<br>"?>
        <p>Email: <input type="text" name="email" value=<?php if(!empty($_POST['email'])){print $_POST['email'];}?>></p>
        <?php if(isset($_GET['emailIncorrect'])) print " Debe poner un email correcto.<br>"?>
        <p><?php
                print "<select name='codigo_curso'>";
                print "<option value='-1'>Seleccione un curso</option>";
                $resultado2 = $conexion->query("SELECT * from cursos");
                while($row2 = $resultado2->fetch()){
                    print "<option value=".$row2[0];
                    if(isset($_POST['codigo_curso']) && ($_POST['codigo_curso']==$row2[0])){
                        print " selected";
                    }
                    print ">".$row2[1]."</option>";
                }
                print "</select>";
        ?></p>
        <?php if(isset($_GET['cursoIncorrect'])) print " Debe seleccionar un curso.<br>"?>
    
        <button type="submit" name="add">Crear Alumno</button>
    </form>
</body>
</html>