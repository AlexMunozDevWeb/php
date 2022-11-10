<?php

  $fich = fopen( './3-8Ficheros/fichero_ejemplo.txt', 'r' );
  if ( $fich === FALSE ) {
    echo "No se encuentra fichero_ejemplo.txt";
  } else {
    echo "fichero_ejemplo.txt se abrió con exito.";
  }

  //Leer carácter a carácter
  echo '<p><b>Abrir archivo en modo lectura y leer carácter a carácter usando la funcion fgetc().</b></p>';
  $fich = fopen( './3-8Ficheros/fichero_ejemplo.txt', 'r' );
  if ( $fich === FALSE ) {
    echo "No se encuentra el fichero o no se pudo leer.<br>";
  } else {
    while ( !feof( $fich ) ) {
      $car = fgetc( $fich );
      echo $car;
    }
  }
  fclose( $fich );

  //funcion fscanf()
  echo '<p><b>Para leer un fichero con un determinado formato se puede utilizar la función fscanf(), lee una linea del fichero
           y aplica un formato.</b></p>';
  $fich = fopen( './3-8Ficheros/tabla_numero.txt', 'r' );
  if ( $fich === FALSE ) {
    echo "No se encuentra el fichero o no se pudo leer.<br>";
  } else {
    $valores = fscanf( $fich, "%d %d %d" );
    var_dump( $valores );
    rewind( $fich );
    while ( !feof( $fich ) ) {
      $num = fscanf( $fich, "%d %d %d", $num1, $num2, $num3 );
      echo " $num1, $num2, $num3<br>";
    }
  }
  fclose( $fich );

  //Funciones file_get_contents y file_put_contents
  $contenido = file_get_contents('./3-8Ficheros/fichero_ejemplo.txt');
  echo "Contenido del fichero: $contenido <br>";
  $res = file_put_contents('./3-8Ficheros/fichero_ejemplo_salida.txt', 'Fichero creado con file_put_contents.');
  if ( $res ) {
    echo "Fichero creado con éxito.";
  } else {
    echo "Error al crear el fichero";
  }

?>