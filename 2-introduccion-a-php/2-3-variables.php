<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2.3 Tipos de variables</title>
</head>
<body>

  <h2>Tipos de variables</h2>
  <?php
  // Declaracion de variables
  $entero = 4; //Entero
  $numero = 4.5; //tipo coma flotante
  $cadena = "cadena";
  $bool = TRUE;
  //Cambio de tipo de una variable
  $a = 5; //entero
  echo gettype( $a ); //Imprime tipo de dato
  echo "<br>";
  $a = "Hola";
  echo gettype( $a ); //Imprime tipo de dato
  ?>
  
  <h2>Asignación por copia y referencia.</h2>
  <?php
  $var1 = 100;
  $var2 = &$var1; //asignación por referencia
  $var3 = $var1; //asignación por copia

  echo "$var2<br>";
  $var2 = 300;
  echo "$var1<br>";
  $var3 = 400;
  echo $var1;
  ?>

  <h2>Constantes</h2>
  <?php
    define( "LIMITE", 1000 );
    echo LIMITE;
  ?>

  <h2>Tipo de datos escalares</h2>
  <h4>( numeros )</h4>
  <?php 
    echo PHP_INT_SIZE.'<br>';
    echo PHP_INT_MIN.'<br>';
    echo PHP_INT_MAX.'<br>';

    $a = 0b100; //en binario
    $a = 0100; //octal
    $a = 0x100; //hexadecimal
    $a = 3/2; //la división entre enteros no da problemas
    echo $a.'<br>'; // 1.5
    $b = 7.5; 
    $a = (int)$b; //casting int
    echo $a.'<br>'; // El 7 se trunca
    $b = 7e2 ; //Notación científica
    $b = 7E2 ;
  ?>
  
  <h4>( cadenas )</h4>
  <?php
    $var = "Paco";
    $a = "Hola $var <br>";
    $b = 'Hola $var <br>';
    echo $a;
    echo $b;
  ?>

  <h4>Variables predefinidas</h4>
  <?php
    echo "Ruta dentro del htdocs/www: " . $_SERVER['PHP_SELF'] . '<br>';
    echo "Nombre del servidor: " . $_SERVER['SERVER_NAME'] . '<br>';
    echo "Software del servidor: " . $_SERVER['SERVER_SOFTWARE'] . '<br>';
    echo "Protocolo: " . $_SERVER['SERVER_PROTOCOL'] . '<br>';
    echo "Método de la petición: " . $_SERVER['REQUEST_METHOD'] . '<br>';
  ?>

</body>
</html>