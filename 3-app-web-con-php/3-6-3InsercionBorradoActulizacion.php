<?php
  $conexion = 'mysql:dbname=empresa;host=127.0.0.1';
  $usuario = 'root';
  $clave = '';
  try {
    
    $bd = new PDO( $conexion, $usuario, $clave );
    echo 'Conexión realizada con éxito<br>';
    //Insertar nuevo usuario
    $insercion = "INSERT INTO usuarios(nombre, clave, rol) values( 'Alberto' , '3333' , '1');";
    $resultado = $bd->query( $insercion );
    if ( $resultado ) {
      echo 'Insercción correcta.<br>';
      echo 'Filas insertadas: ' . $resultado->rowCount() .'<br>';
    }else {
      print_r( $bd->errorinfo() );
    }
    //Para los incrementos
    echo 'Código de la fila insertada ' . $bd->lastInsertId() . '<br>';
    //Actualizar
    $update = "UPDATE usuarios set rol = 0 WHERE rol = 1";
    $resultado = $bd->query( $update );
    //Comprobar errores
    if ( $resultado ) {
      echo 'Update correcto.<br>';
      echo 'Filas actualizadas: ' . $resultado->rowCount() . '<br>';
    }else {
      print_r( $bd->errorinfo() );
    }
    //Borrar
    $borrar = "DELETE FROM usuarios WHERE nombre = 'jose'";
    $resultado = $bd->query( $borrar );
    //Comprobar errores
    if ( $resultado ) {
      echo 'Delete correcto.<br>';
      echo 'Filas actualizadas: ' . $resultado->rowCount() . '<br>';
    }else {
      print_r( $bd->errorinfo() );
    }

  } catch (\Throwable $th) {

  }
?>