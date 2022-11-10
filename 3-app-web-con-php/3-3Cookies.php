<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COOKIES</title>
  <?php
    if ( !isset( $_COOKIE[ "visitas" ] ) ) { // Si no existe.
      setcookie( 'visitas', '1', time() + 3600 * 24 );
      echo 'Bienvenido por primera vez';
    } else if ( (int)$_COOKIE[ 'visitas' ] == 2 ) { //Borrado
      setcookie( 'visitas', '', time() - 3600 * 24 );
      echo 'Cookie borrada';
    } else { //si existe
      $visitas = (int)$_COOKIE[ 'visitas' ];
      $visitas++;
      setcookie( 'visitas', $visitas, time() + 3600 * 24 );
      echo "Bienvenido por $visitas vez";
    }
  ?>
</head>
<body>
  
  <h2>Cookies</h2>
  <p>Las cookies son pequeños ficheros que se almacenan en el cliente para almacenar información como la última visita o 
     preferencia de idiomas, etc... <br> Para manejar las cookies se utiliza la función <b>setcookie()</b>
  </p>
  <p>Para la fecha de caducidad se toma la actual, que es el valor que devuelve <b>time()</b> y se le suma 3600 * 24 <br>
  <b>setcookie( 'visitas', '1', time() + 3600 * 24 )</b>
  <br>
  Para destruir la cookies: <b>setcookie( 'visitas', '1', time() - 3600 * 24 )</b>
  <br>
  
  </p>
    Las cookies se envían como cabeceras en las peticiones HTTP. Hay que enviar las cabeceras antes de comenzar con el cuerpo de 
    la respuesta.
  <p>

  </p>


</body>
</html>