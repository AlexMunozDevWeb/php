<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funciones</title>
</head>
<body>

  <h2>Funciones</h2>
  <p><b>Funciones predefinidas:</b></p>
  <?php
    echo 'is_null( $var ). Devuelve TRUE si $var es NULL, FALSE en otro caso.' . '<br>';
    echo 'isset( $var ). Devuelve TRUE si $var ha sido inicializada y su valor no es NULL, FALSE en otro caso.' . '<br>';
    echo 'unset( $var ). Elimina la variable. Ya no contará como inicializada.' . '<br>';
    echo 'empty( $var ). Devuelve TRUE si $var no ha sido inicializada o su valor es FALSA.' . '<br>';
    echo 'is_int( $var ), is_float( $var ), is_bool( $var ), is_array( $var ). Devuelve TRUE si $var es entero, float, booleano o array
          respectivamente, y FALSE en otro caso.' . '<br>';
    echo 'print_r( $var ) y var_dump( $var ). Muestra información sobre $var.' . '<br>';
    echo "PARA VER MAS FUNCIONES PREDEFINIDAS -> PÁGINA 49 DEL LIBRO.<br>";
  ?>
  
  <p><b>Funciones definidas por el usuario:</b></p>
  <?php 
    function saludar( $nombre = 'Ana' ){
      echo "Hola $nombre.<br>";
    }
    saludar();
    saludar( 'Alex' );
  ?>

  <p><b>Actividad</b></p>
  <p>Escribe una función para calcular potencias. Recibira como argumente la base y el exponente, que es opcional y tiene
    valor por defecto 2(elevar al cuadarado).</p>
  <?php
  function potencia( $base, $exponente = 2 ){
    echo pow($base, $exponente) . '<br>';
  } 
  
  potencia( 2 );
  potencia( 3, 3 );
  
  ?>

  <p><b>Paso de argumentos por copia y por valor.</b></p>
  <?php 
  $num = 6;
  function duplicar( $num ){
    return $num*2;
  }
  function duplicar2( &$num ){
    echo $num*2 . "<br>";
  }
  $num = duplicar( $num );
  echo $num . '<br>';
  duplicar2( $num );
  ?>

  <p><b>Funciones como argumento.</b></p>
  <?php 
    function calculador( $operacion, $numa, $numb ){
      $resultado = $operacion($numa, $numb);
      return $resultado;
    }
    
    function resta($a, $b){
      return $a - $b;
    }
    
    function multiplicar($a, $b){
      return $a * $b;
    }

    $a = 10;
    $b = 5;

    $r1 = calculador( 'resta', $a, $b );
    echo "$r1 <br>";
    $r2 = calculador( 'multiplicar', $a, $b );
    echo "$r2 <br>";
  ?>

<p><b>Actividad</b></p>
<p>Escribe una función para calcular el factorial de un número, que recibirá como argumento. Devolverá el factorial o -1 
   si el argumento no es válido.</p>
<?php 
  function factorial( $num ){
    $result = 1;
    for ($i = $num; $i >= 1 ; $i--) { 
      $result *= $i; 
    }
    echo $result . '<br>';
  }
  factorial( 4 );
  factorial( 5 );
  factorial( 6 );
?>

</body>
</html>