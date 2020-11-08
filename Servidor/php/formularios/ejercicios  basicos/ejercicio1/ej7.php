<?php 
$numeros = $_REQUEST;
$num_veces = random_int($numeros['nummin'], $numeros['nummax']);
$array = [];

for ($i=0; $i < $num_veces ; $i++) { 
    $array[$i] = random_int($numeros['valuemin'], $numeros['valuemax']);
}

print_r($array);

?>