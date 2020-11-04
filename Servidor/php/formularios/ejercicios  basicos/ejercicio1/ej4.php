<?php 
    $segundos = $_REQUEST['seg'];
    if (ctype_digit($segundos)) {
        print floor($segundos/60). ' minutos' ;
        print '<br>';
        print  $segundos%60 . ' segundos';
    }
?>
