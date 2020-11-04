<?php 
    $size = $_REQUEST['size'];
    if (ctype_digit($size) && ($size > 0 && $size <=100)) {
    print '<table>';
        for ($i=1; $i <= $size; $i++) { 
            print '<tr>';
            for ($j=1; $j <= $size; $j++) { 
                print '<th>';
                print $i*$j;
                print '</th>';
            }
            print '</tr>';
            
        }
        print '</table>';
    }
?>
