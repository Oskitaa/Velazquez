<?php 
    $year = $_REQUEST['year'];
    if (ctype_digit($year) && ($year >= 0 && $year <=10000)) {
        
      if( ($year%4 == 0 ) && ($year%100 != 0 ) || ($year%400 == 0 )){

        print '<br> es bisiesto';
    } 
    else print 'no lo es';
}
?>
