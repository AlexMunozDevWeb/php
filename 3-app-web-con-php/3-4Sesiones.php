<?php
  session_start();
  if ( !isset( $_SESSION[ 'count' ] ) ) {
    $_SESSION[ 'count' ] = 0;
  } else {
    $_SESSION[ 'count' ]++;
  }
  echo "Hola " . $_SESSION[ 'count' ];
  echo "<br><a href='./3-4sesiones/sesiones_basico.php'>Siguiente</a>";
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sesiones</title>
</head>
<body>
    <h2>Sesiones</h2>
</body>
</html>