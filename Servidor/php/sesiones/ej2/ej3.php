<?php
session_start();
$premio= 0;
if (isset($_SESSION['monedas'])) {
    $monedas = $_SESSION['monedas'];    
} else{
    $monedas = 0;
}

if(!isset($_SESSION['tirada'])){
    $_SESSION['tirada']=[];
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
    
    <form action="ej3-2.php" method="post">
    
    
    <table>
    <th><?php (!isset($_SESSION['tirada'][0]))?print('&#127827'):print('&#'.$_SESSION['tirada'][0]);?></th>
    <th><?php (!isset($_SESSION['tirada'][1]))?print('&#127827'): print('&#'.$_SESSION['tirada'][1]);?></th>
    <th><?php (!isset($_SESSION['tirada'][2]))?print('&#127827'): print('&#'.$_SESSION['tirada'][2]);?></th>
    <th>
    
    <button name="moreMoney">Meter moneda</button>
    <p name="monedas"><?=($monedas)?$monedas:"0"?></p>
    <?php
    if($monedas != 0){
        print('<button name="jugar">Jugar</button>');
    }else{
        print('<button disabled name="jugar">Jugar</button>');
    }
    ?>
    <p name="premio">Premio:<?=(isset($_SESSION['premio']))?$_SESSION['premio']:0?></p>
    
    </th>
    

    </table>
    

    </form>

</body>
</html>