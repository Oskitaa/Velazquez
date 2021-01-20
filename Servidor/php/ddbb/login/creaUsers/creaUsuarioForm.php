<?php
    require_once('../conexion.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadi usuarioh</title>
</head>
<body>
    <form action="./insertUsuario.php" method="POST">
        <p>Usuario: <input type="text" name="user" value=<?php if(!empty($_POST['user'])){print $_POST['user'];}?> > <?php (isset($_GET['userIncorrect'])) ? print " Debe poner un nombre de usuario correcto.<br>" : print ""; (isset($_GET['duplicateUsername']))? print "Nombre de usuario duplicado." : print ""?></p>
        <p>Contraseña: <input type="password" name="password"><?php if(isset($_GET['passwordIncorrect'])){print " Debe poner una contraseña correcta.<br>";}?></p>
        <p><select name="rol">
            <option value="-1">Seleccione un rol</option>
            <?php
                $resultado = $conexion->query('select * FROM roles');
                while ($registro = $resultado->fetch()) {
                    print "<option value=$registro[0] >$registro[1]</option>";
                }
            ?>
        </select><?php if(isset($_GET['rolIncorrect'])){print " Debe seleccionar un rol";} ?></p>
        <button type="submit" name="add">Añadir</button>
    </form>
</body>
</html>