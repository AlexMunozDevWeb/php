<?php 
  require_once 'bd.php';
  if ( !comprobar_sesion() )  return;

  $productos = cargar_productos( array_keys( $_SESSION[ "carrito" ] ) );
  //Añadir sesiones
  $productos = iterator_to_array( $productos );
  foreach( $productos as &$producto ){
    $cod = $producto[ 'CodPro' ];
    $producto[ 'unidades' ] = $_SESSION[ 'carrito' ][ $cod ];
  }
  echo json_encode( $productos );
?>