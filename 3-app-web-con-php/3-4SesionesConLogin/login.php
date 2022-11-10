<?php
  function comprobarUsuario( $nombre, $clave ){
    if ( $nombre == 'alex' && $clave == '1234' ) {
      $usu[ 'nombre' ] = 'usuario';
      $usu[ 'rol' ] = '0';
      return $usu;
    } elseif ( $nombre === 'admin' && $clave === 'admin' ) {
      $usu[ 'nombre' ] = 'admin';
      $usu[ 'rol' ] = '1';
      return $usu;
    }else{
      return FALSE;
    }
  }

  if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $usu = comprobarUsuario( $_POST[ 'usuario' ], $_POST[ 'clave' ] );  
    if( !$usu ){
      $err = TRUE;
      $usuario = $_POST[ 'usuario' ];
    }else{
      session_start();
      $_SESSION[ 'usuario' ] = $_POST[ 'usuario' ];
      header( "Location:inicio_sesion.php" );
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <?php
    if ( isset( $_GET[ 'redirigido' ] ) ) {
      echo '<p>Haga login para continuar.</p>';
    }
    if ( isset( $err ) && $err ) {
      echo '<p>Revise usuario y contraseña.</p>';
    }
  ?>
  <h2>Inicio de sesión:</h2>
  <form action="<?php echo htmlspecialchars( $_SERVER[ 'PHP_SELF' ] ) ?>" method="post">
    <label>Usuario: </label>
    <input name="usuario" type="text" id="usuario" 
           value="<?php echo isset( $_POST[ 'usuario' ] ) ? $_POST[ 'usuario' ] : '' ;?>">
    <label>Contraseña: </label>
    <input name="clave" id="clave" type="password">
    <input type="submit" value="Enviar">
  </form>
</body>
</html>