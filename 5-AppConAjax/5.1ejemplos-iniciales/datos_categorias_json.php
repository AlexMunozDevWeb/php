<?php

  $conexion = 'mysql:dbname=pedidos;host=127.0.0.1';
  $usuario = 'root';
  $clave = '';
  $bd = new PDO( $conexion, $usuario, $clave );

  $sql = "SELECT * FROM categorias;";
  $result_sql = $bd->query( $sql );

  $categorias = array();
  foreach( $result_sql as $row ){
    array_push( $categorias, $row );
  }

  $json = json_encode( $categorias );
  echo $json;
?>