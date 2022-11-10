
<?php 
  if( isset( $_POST[ 'id_user' ] ) ){
    try{
      $conexion = 'mysql:dbname=empresa;host=127.0.0.1';
      $usuario = 'root';
      $clave = '';
      $bd = new PDO( $conexion, $usuario, $clave );
      echo 'Conexión realizada con exito<br>';
      $sql = 'SELECT nombre, clave, rol FROM usuarios WHERE idusuarios = ' . $_POST[ 'id_user' ] . ';';
      $usuarios = $bd->query( $sql );
      // echo $usuarios->rowCount().'<br>';
      if( $usuarios->rowCount() > 0 ){
        foreach ($usuarios as $row) {
          print $row['nombre'] . "\t";
          print $row['clave'] . "\t";
          print $row['rol'] . "\t";
        }
      } else {
        echo 'El usuario con id ' . $_POST[ 'id_user' ] . ' no existe.';
      }
      $bd = null;
    } catch ( PDOException $e ) {
      echo 'Error con la base de datos: ' . $e->getMessage();
    }
  }
?>

<p>Intrucciones preparadas para permitir parámetros.</p>
<?php
  $conexion = 'mysql:dbname=empresa;host=127.0.0.1';
  $usuario = 'root';
  $clave = '';
  $bd = new PDO( $conexion, $usuario, $clave );
  $preparada = $bd->prepare( 'SELECT nombre, clave, rol FROM usuarios WHERE rol = ?');
  $preparada->execute( array( 1 ) );
  echo 'Para el rol 1 hay ' . $preparada->rowCount() . ' usuarios.';
  $bd = null;
  
  ?>
<p>Execute</p>
<?php
  $conexion = 'mysql:dbname=empresa;host=127.0.0.1';
  $usuario = 'root';
  $clave = '';
  $bd = new PDO( $conexion, $usuario, $clave );
  $preparada = $bd->prepare( 'SELECT nombre, clave, rol FROM usuarios WHERE rol = :rol');
  $preparada->execute( array( ':rol' => 0 ) );
  echo 'Para el rol 0 hay ' . $preparada->rowCount() . ' usuarios.';
  $bd = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Busqueda con id</title>
</head>
<body>
  <h2>Busqueda por id</h2>
  <form action="<?php echo htmlspecialchars( $_SERVER[ 'PHP_SELF' ] ) ?>" method="post">
    <label>Busqueda por id:</label>
    <input type="number" name="id_user" id="id">
    <input type="submit" value="Buscar">
  </form>
</body>
</html>