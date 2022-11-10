
<?php
  session_start();
  if( !isset( $_SESSION[ 'usuario' ] ) ){
    header( "Location:login.php?redirigido=true" );
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de sesión</title>
</head>
<body>
  <h2>Sesión iniciada.</h2>
  <p>Bienvenido <?php echo $_SESSION[ 'usuario' ]; ?></p>
  <br>
  <a href="logout.php">Salir</a>
</body>
</html>