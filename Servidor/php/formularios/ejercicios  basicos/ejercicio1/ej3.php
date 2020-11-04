<?php 
$num1 = $_REQUEST['num1'] ;
$num2 = $_REQUEST['num2'] ;
$simbolo = ["resta" => $num1 - $num2, "suma" => $num1 + $num2, "mul" =>$num1 * $num2];
print($simbolo[$_REQUEST["operacion"]]);
?>