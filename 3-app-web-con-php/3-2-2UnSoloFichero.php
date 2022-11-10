<?php
  
  if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ){
    if( $_POST[ 'usuario' ] == 'alex' && $_POST[ 'clave' ] == '1' ){
      header( 'Location:./3-2-formularios/bienvenido.html' );
    } else {
      $err = TRUE;
    }
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formularios</title>
</head>
<body>
  <h2>Formularios de login</h2>
  <?php
    if ( isset( $err ) ) {
      echo '<p>Revise usuario y contraseña</p>';
    } 
  ?>
  <form action="<?php echo htmlspecialchars( $_SERVER[ 'PHP_SELF' ] ) ?>" method="post">
    <input name="usuario" type="text">
    <input name="clave" type="password">
    <input type="submit" value="Enviar">
  </form>
  <p>La variable super global $_SERVER[ 'PHP_SELF' ] contiene el nombre del fichero y la función <b>htmlspecialchars</b>
     sirve para filtrar los carateres por seguridad.</p>
</body>
</html>