<?php 

$datos =[
    ["codigo" => "1020TV","nombre" => "Televisor", "precio" => "750","stock" => "30","marca" => "LG", "actualizacion" => "13/11/2020" ],
    ["codigo" => "1518CM","nombre" => "Camara", "precio" => "325","stock" => "22","marca" => "Nikon", "actualizacion" => "10/10/2020" ],
    ["codigo" => "2050CN","nombre" => "Portatil", "precio" => "299","stock" => "15","marca" => "Nintendo", "actualizacion" => "23/09/2020" ],
    ["codigo" => "3065PT","nombre" => "Consola", "precio" => "595","stock" => "7","marca" => "Lenovo", "actualizacion" => "31/08/2020" ],
    ["codigo" => "3560AA","nombre" => "Aire", "precio" => "420","stock" => "18","marca" => "Daikin", "actualizacion" => "09/09/2020" ],
    ["codigo" => "4090RC","nombre" => "Robot", "precio" => "380","stock" => "35","marca" => "Moulinex", "actualizacion" => "26/10/2020" ],
    ["codigo" => "5020MC","nombre" => "Microondas", "precio" => "175","stock" => "8","marca" => "Candy", "actualizacion" => "19/07/2020" ],
    ["codigo" => "5575RI","nombre" => "Raton", "precio" => "15","stock" => "35","marca" => "Logitec", "actualizacion" => "24/10/2020" ],
    ["codigo" => "6070AV","nombre" => "Altavoces", "precio" => "30","stock" => "4","marca" => "Sony", "actualizacion" => "01/10/2020" ],
    ["codigo" => "7025MV","nombre" => "Movil", "precio" => "500","stock" => "10","marca" => "Samsung", "actualizacion" => "30/11/2020" ]
];

function creaCartas($cartas,&$array_cartas,$min,$max){
    for ($i=0; $i < $cartas; $i++) { 
      array_push($array_cartas,rand($min,$max));
    }
  }

function obtenerDatos($datos,$codigos = "",$adicional = ""){
    $array_final= [];

    foreach($datos as $dato){
            array_push($array_final,$dato['nombre']);
    }

    if($adicional != ""){
        $array_final= [];
        foreach($datos as $dato){
            foreach($codigos as $codigo){
                if($dato['nombre'] == $codigo){
                    array_push($array_final,["codigo" => $dato['codigo'],"nombre" => $dato['nombre'],$adicional => $dato[$adicional]]);
                }
            }
        }
    }
    elseif($codigos != ""){
        $array_final= [];
        foreach($datos as $dato){
            foreach($codigos as $codigo){
                if($dato['nombre'] == $codigo){
                    array_push($array_final,["codigo" => $dato['codigo'],"nombre" => $dato['nombre']]);
                }
            }
        }
    }


return $array_final;
}

?>