<?php


function isValid($var, $tam){
    if(!is_float($var)){   
        print ('No es un float');
        return false;
    }
    if(!($var >= 0 && $var <= $tam )){
        print ('Mayor o menos que');
        return false;
    } 
    return true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calculadora de divisiones</h1>
    <?php
    if(isset($_POST)){
        $divisor = (float)($_POST['divisor']);
        $dividendo = (float)($_POST['dividendo']);
        if(!(isValid($divisor,10000) && isValid($dividendo,10000) && $divisor!=0)){
    ?>
    <form action="" method="POST">
        <p>Dividendo<input type="text" name="dividendo"></p>
        <p>Divisor<input type="text" name="divisor"></p>
        <button>Enviar</button>
    </form>
    
    <?php
        print('Errores encontrados.');
       } else {
        print('<p>'. $dividendo/$divisor .'</p>');
    }}
    ?>
</body>
</html>