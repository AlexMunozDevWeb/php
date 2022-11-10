<?php
  require_once 'bd.php';

  if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $usu = comprobar_usuario( $_POST[ 'usuario' ], $_POST[ 'clave' ] );  
    if( !$usu ){
      $err = TRUE;
      $usuario = $_POST[ 'usuario' ];
    }else{
      session_start();
      $_SESSION[ 'usuario' ] = $usu;
      $_SESSION[ 'carrito' ] = [];
      header( "Location:categorias.php" );
      return;
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
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
  <h2>Formulario de login</h2>
  <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ) ?>" method="post">
    <label for="usuario">Usuario</label>
    <input type="text" name="usuario" id="usuario" value="<?php echo isset( $usuario ) ? $usuario : '' ; ?>">
    <label for="clave">Clave</label>
    <input type="password" name="clave" id="clave">
    <input type="submit" value="Login">
  </form>
</body>
</html>