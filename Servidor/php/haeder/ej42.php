<?php
    if(!empty($_REQUEST['nombre']) && (isset($_REQUEST['estatura'])  && ($_REQUEST['estatura'] >= 70 && $_REQUEST['estatura'] <=250))){
        print("<p>Su nombre es {$_REQUEST['nombre']}</p>");
        print("Su altura es ". (floor($_REQUEST['estatura']/100) .",". $_REQUEST['estatura']%100)."metros");
    } else{
        header("Location:". $_SERVER['HTTP_REFERER'],true,307);
    }


?>