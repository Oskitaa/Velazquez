<?php
session_start();


if(isset($_REQUEST['moreMoney'])){
    meterMoneda();
}

if(isset($_REQUEST['jugar'])){
    $_SESSION['monedas']--;
    $_SESSION['tirada']=[];
    for ($i=0; $i <3 ; $i++) { 
        array_push($_SESSION['tirada'],rand(127817 , 127827) );
    }
    $_SESSION['premio'] = 0;
    print_r(array_count_values($_SESSION['tirada']));
    if(in_array(127827,$_SESSION['tirada'])){
        switch (array_count_values($_SESSION['tirada'])[127827]) {
            case 1:
                $_SESSION['monedas'] += (in_array(2,array_count_values($_SESSION['tirada'])))? 3 : 1;
                $_SESSION['premio'] += (in_array(2,array_count_values($_SESSION['tirada'])))? 3 : 1;
            break;    
            case 2:
                $_SESSION['monedas'] += 4;
                $_SESSION['premio'] += 4;
            break;
            case 3:
                $_SESSION['monedas'] +=10;
                $_SESSION['premio'] +=10;
            break;
        }

    }

    if(!in_array(127827,array_count_values($_SESSION['tirada']))){
        if (count(array_count_values($_SESSION['tirada']))<3) {
        $_SESSION['monedas'] += (in_array(2,array_count_values($_SESSION['tirada'])))? 2 : 5;
        $_SESSION['premio'] += (in_array(2,array_count_values($_SESSION['tirada'])))? 2 : 5;   
        }
    }

    header("Location:". $_SERVER['HTTP_REFERER'],true,307); 
}
function meterMoneda(){
    $_SESSION['monedas']++;
    header("Location:". $_SERVER['HTTP_REFERER'],true,307);
}

?>