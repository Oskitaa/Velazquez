<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Encuesta (Resultado)</h1>
    
    <p>Se han contestado <?=count($_POST)?> de <?=$_SESSION['req']?></p>
    <ul>
        <?php
        for ($i=1; $i <= $_SESSION['req']; $i++) { 
            $a = "pregunta$i";
            if (isset( $_POST[$a])) {
                print("<p><li>A la pregunta $_SESSION[$a] se ha contestado $_POST[$a]</li></p>");
            }
            
        }
        ?>
    </ul>
</body>
</html>