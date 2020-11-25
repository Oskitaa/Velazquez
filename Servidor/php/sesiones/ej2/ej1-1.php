<?php 
    session_start();
    print_r ($_POST);
    if(isset($_POST['bajar'])){
        if( $_SESSION['contador'] > 0){$_SESSION['contador']-=1;}
    }
    if(isset($_POST['subir'])){
        $_SESSION['contador']+=1;
    }
    if(isset($_POST['cero'])){
        $_SESSION['contador']=0;
    }
    header("Location:". $_SERVER['HTTP_REFERER']);
?>