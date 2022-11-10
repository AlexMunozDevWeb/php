
<?php
  require 'sesiones.php';
  comprobar_sesion();
  $cod = $_POST[ 'cod' ];
  $unidades = (int)$_POST[ 'unidades' ];
  //Si existe el codigo sumamos las unidades
  if ( isset( $_SESSION[ 'carrito' ][ $cod ] ) ) {
    $_SESSION[ 'carrito' ][ $cod ] += $unidades;
  } else {
    $_SESSION[ 'carrito' ][ $cod ] = $unidades;
  }
  header( 'Location: carrito.php' );
?>