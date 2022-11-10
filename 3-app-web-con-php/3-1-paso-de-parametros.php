<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paso de parámetro</title>
</head>
<body>
  <h2>Paro de parámetro</h2>
  <p>Los más utilizados son GET y POST, el metodo GET viaja por la URL y el POST mediante formularios, siendo mas seguro este último.</p>
  <span>http://localhost/cap3/hola_nombre.php?nombre=Ana</span><br>
  <span>En el archivo: echo "Hola " . $_GET[ "nombre" ];</span><br>
  <span>Recibiremos: Hola Ana.</span><br>
  <span>Si no tenemos el get, obtenemos un Notice: Undefined index...</span><br>
  <?php
    if ( empty( $_GET[ "nombre" ] ) ) {
      echo 'Error, falta el parámetro nombre <br>';
    } else {
      echo "Hola " . $_GET[ "nombre" ] . '<br>';
    }
  ?>
  <p><b>Actividad</b></p>
  <p>Escribe un fichero que reciba dos parámetros, num1, num2 y muestre su suma. Hay que comprobar que los dos valores existan y sean 
    numéricos</p>
  <?php

  if( isset( $_GET[ "num1" ] ) && isset( $_GET[ "num2" ] ) ){
    if ( is_numeric( $_GET[ "num1" ] ) && is_numeric( $_GET[ "num2" ] ) ) {
      echo $_GET[ "num1" ] +  $_GET[ "num2" ];
    }else{
      echo 'No es numerico';
    }
  }else{
    echo 'Numero vacio';
  }
  ?>
</body>
</html>