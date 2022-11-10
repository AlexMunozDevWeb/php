<?php 
  require_once 'bd.php';
  if ( !comprobar_sesion() )  return;

  $cod = $_POST[ 'cod' ];
  $unidades = (int)$_POST[ 'unidades' ];
  //Si existe el codigo sumamos las unidades
  if ( isset( $_SESSION[ 'carrito' ][ $cod ] ) ) {
    $_SESSION[ 'carrito' ][ $cod ] += $unidades;
  } else {
    $_SESSION[ 'carrito' ][ $cod ] = $unidades;
  }
?>