<?php
if(isset($_POST)){
    if(isValid($_POST['row'],1000) && isValid($_POST['col'],100)){
        pintaTabla($_POST['col'],$_POST['row']);
    } else {
        print('<p>Error</p>');
    }
}

function pintaTabla($col,$row){
    $cont =1;
    print '<table>';
    
    for ($i=1; $i <= ceil($row/$col); $i++) { 
        print '<tr>';
        for ($j=1; $j <= $col; $j++) { 
            print '<th>';
            if($cont <= $row){
            print $cont;
            }
            print '</th>';
            ++$cont;
        }
        print '</tr>';
        
    }
    print '</table>';
}


function isValid($var, $tam){
    if(!ctype_digit($var)){   
        return false;
    }
    if(!($var >= 0 && $var <= $tam )){
        return false;
    } 
    return true;
}


?>