<?php
$randon = rand(0,999);

echo ($randon < 10) ? "Un digito" : ($randon < 100) ? "Dos digitos" : "Tres digitos";

$edades = ['Juan' => 18, 'Pepe' => 20];

print 'Juan tiene ' . $edades['Juan'];
 $personas= [ 'Oscar' => ["Edad" => 20, "Peso" => 20] , 'Manolo' => ["Edad" => 24, "Peso" => 29]];

print_r ($personas);

$matri = ["1" =>1 , "2" =>1 , "3" =>2 , "hola" =>43 ];
$matri2 = ["11" =>1 , "22" => 2 , "33" =>3 , "hola" =>4];

$matriunia = array_merge($matri, $matri2);
print "<br>";
print_r ($matriunia);
print "<br>";

$muchonume = [0,2,10,4,15,1,19];

sort($muchonume);

print_r ($muchonume);
print "<br>";
rsort($muchonume);
print_r ($muchonume);
print "<br>";
print "el pepeo";
?>  