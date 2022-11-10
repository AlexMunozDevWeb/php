<?php 
  require_once 'bd.php';
  if ( !comprobar_sesion() )  return;

  $resul = insertar_pedido( $_SESSION[ 'carrito' ], $_SESSION[ 'usuario' ][ 'usuario' ]);
  if ( $resul === FALSE ) {
    echo "FALSE";
  } else {
    $correo = $_SESSION[ 'usuario' ][ 'correo' ];
    $compra = $_SESSION[ 'carrito' ]; 
    $_SESSION[ 'carrito' ] = []; //Vaciar carrito
    echo "TRUE";
    // enviar_correo( $compra, $pedido, $correo );
  }
?>