<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php


    echo '<h3>Empleados</h3>';



  $empleados = array (
        '34863698L' => array ("Manuel","Gutierrez Garcia",23,"Analista","A",10,2000),
        '84654746A' => array ("Carlos","Perez Gomez",25,"Programador","A",7,1800),
        '77849637K' => array ("Laura","Garcia Alvarez",22,"Analista","A",12,1200),
        '34554553H' => array ("Ana","Peinado Bobillo",24,"Programador","A",5,1500)
    );

    print_r($empleados);
   
    function anadir($empleados,$nuevo) {
        
       
       array_push($empleados,$nuevo);
       
       mostrar($empleados);
        return $empleados;
    }
    
    function modificar(){

    }

    /*function borrar($empleados) {
        unset($empleados['34863698L']);
        return $empleados;
        
    }*/

    function eliminar($empleados,$value){
        unset($empleados[$value]);
        echo 'Eliminando '.$value;
        mostrar($empleados);
        return $empleados;
    }
    

    function comprueba_dni($dni){
        $letra = substr($dni, -1);
        $numeros = substr($dni, 0, -1);
        if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
          echo 'valido';
        }else{
          echo 'no valido';
        }
      }


      function comprueba_edad($edad){
          if ($edad >= 18 and $edad <100){
              echo 'Registro Añadido';
          }else{
              echo 'Error';
          }
      }


      function comprueba_puesto($puesto){
          if($puesto == "analista" or "programador" ){
            echo 'Registro Añadido';
          }else {
              echo 'Error';
          }
      }


      function comprueba_salario($salario){
          if ($salario >= 950){
              echo 'Registro Añadido';
          }else{
              echo 'Error';
          }
      }


      function comprueba_antiguedad($antiguedad){
          if ($antiguedad <=0){
              echo 'Error';
          }else{
              echo 'Registro Añadido';
          }
      }


      function mostrar($empleados){
        echo "<table border=1>";
    
        foreach ($empleados as $key =>$empleados){
            echo '<tr>';
            echo '<td>';
            echo $key;
            echo '<td>';
            foreach ($empleados as $value) {
                echo '<td>';
                echo $value;
                echo '</td>';
            }
            echo '</tr>';
        }
        
        echo '</table>';
      }


 
        


       
    
         mostrar($empleados);



    echo '<h3>Gestion de empleados</h3>';


    /*if (isset($_POST['borrar'])) {
        $empleados=borrar($empleados,['34863698L']);
        $empleados=borrar($empleados);
    }  */


    if(isset($_POST['borrar'])){
        
       eliminar($empleados,$_POST['dni']);
       
    }
       
  
    
    if (isset($_POST['anadir'])) {
        $datos = $_POST;
        
        mostrar(anadir($empleados,array ($datos['dni'] => ([$datos['nombre'],$datos['apellidos'],$datos['edad'],$datos['puesto'],$datos['subpuesto'],$datos['antiguedad'],$datos['salario']]))));
        }

?>

  


    <form action="" method="post">
    <input type="submit"  name="anadir" class="button" value="Añadir"  />
        <input type="submit" name="Modificar" class="button" value="Modificar"  />
        <input type="submit" name="borrar" class="button" value="Borrar"  />
        <p>DNI <input type="text" name="dni"/></p>
        <p>Nombre <input type="text" name="nombre"/></p>
        <p>Apellidos <input type="text" name="apellidos"/></p>
        <p>Edad  <input type="text" name="edad"/></p>
        <p>Puesto  <input type="text" name="puesto"/></p>
        <p>Subpuesto  <input type="text" name="subpuesto"/></p>
        <p>Antiguedad  <input type="text" name="antiguedad"/></p>
        <p>Salario  <input type="text" name="salario"/></p>
    </form>
       
</body>
</html>