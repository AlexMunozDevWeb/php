<?php
  $conexion = 'mysql:dbname=empresa;host=127.0.0.1';
  $usuario = 'root';
  $clave = '';
  try{
    $bd = new PDO( $conexion, $usuario, $clave );
    echo 'Conexión realizada con exito<br>';
    $sql = 'SELECT nombre, clave, rol FROM usuarios';
    $usuarios = $bd->query( $sql );
    echo $usuarios->rowCount().'<br>';
    foreach ($usuarios as $row) {
      print $row['nombre'] . "\t";
      print $row['clave'] . "\t";
      print $row['rol'] . "\t";
    }
    $bd = null;
  } catch ( PDOException $e ) {
    echo 'Error con la base de datos: ' . $e->getMessage();
  }
?>