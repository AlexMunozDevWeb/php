<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Excepciones y errores</title>
</head>
<body>
  <h2>Excepciones y errores</h2>
  <p><b>Errores</b></p>
  <p>error_reporting: indica qué errores deben reportarse. Lo normal es utilizar E_ALL, es decir, todos.</p>
  <p>display_errors: señala si los mensajes de error deben aparecer en la salida del script. Esta opción es apropiada durante
    el desarrollo, pero no en producción.</p>
  <p>log_errors: indica si los mensajes de error deben almacenarse en un fichero. Es especialmente útil en producción, cuando no se 
    muestran los errores en la salida.</p>
  <p>error_log: se la directiva anterior está activada, es la ruta en la que se guardan los mensajes de error.</p>
  <p>Consulta de erroes PAGINA 53 DEL LIBRO.</p>
  <?php
    function manejadorErrores( $errno, $str, $file, $line ){
      echo "Ocurrió el error: $errno";
    }
    set_error_handler( "manejadorErrores" );
    $a = $b; //causa error, $bno esta inicializada
  ?>
  <p><b>Excepciones</b></p>
  <?php
    function dividir( $a, $b ){
      if( $b == 0 ){
        throw new Exception("Es segundo argumento es cero"); 
      }
      return $a/$b;
    }

    try {
      $result = dividir( 5, 0 );
      echo "Resul 1: $result" . "<br>";
    } catch ( Exception $e ) {
      echo "Exception: " . $e->getMessage() . "<br>";
    } finally {
      echo 'Primer finally' . '<br>';
    }
    
    try {
      $result2 = dividir( 5, 2 );
      echo "Resul 2: $result2" . "<br>";
    } catch ( Exception $e) {
      echo "Exception: " . $e->getMessage() . "<br>";
    } finally {
      echo "Segundo finally" . '<br>';
    }

  ?>
  <p><b>Actividad</b></p>
  <p>Adaptar el ejemplo anterior para que controle si el argumento anterior es negativo utilizando una excepción.</p>

  <?php
  function division( $a, $b ){
    if( $b < 0 ){
      throw new Exception("Es segundo argumento es inferior a 0"); 
    }
    if( $b == 0 ){
      throw new Exception("Es segundo argumento es 0"); 
    }
    return $a/$b;
  }

  try {
    $result = division( 5, -1 );
    echo "Resul 1: $result" . "<br>";
  } catch ( Exception $e ) {
    echo "Exception: " . $e->getMessage() . "<br>";
  } finally {
    echo 'Primer finally' . '<br>';
  }
  ?>

  <p><b>Excepciones error</b></p>
  <p>En PHP7 aparecieron las excepciones de tipo Error. No heredan de la clase Exception. VER PÁGINA 55 DEL LIBRO.</p>

</body>
</html>