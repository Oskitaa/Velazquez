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
    <h1>Encuesta</h1>
    <p>Valore de 1 a <?=$_SESSION['res']?></p>
    <form action="ej2-4.php" method='POST'>
    <table>
            <thead>
                <th></th>
                <?php
                for ($i=1; $i <=$_SESSION['res'] ; $i++) { 
                    print("<th>$i</th>");
                }
                ?>
            </thead>
            <tbody>
            <?php
            
            
           for ($i=1; $i <= $_SESSION['req']; $i++) { 
            $a = "pregunta$i";
            $_SESSION[$a] = $_POST[$a];
               print("<tr><th>$_POST[$a]:");
               for ($j=1; $j <= $_SESSION['res']; $j++) { 
                   print("<th><input type='radio' name='pregunta$i' value='$j'></th>");
               }
               print("</th></tr>");
           }
       ?>
            </tbody>
        </table>
        <p><input type="submit" value="Valorar"></p>
    </form>
</body>
</html>