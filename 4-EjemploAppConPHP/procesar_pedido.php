<?php
  // require 'enviar_correo.php';
  require 'sesiones.php';
  require_once 'bd.php';
  comprobar_sesion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pedidos</title>
</head>
<body>
  <?php
    require 'cabecera.php';
    var_dump( $_SESSION['usuario'] );
    var_dump( $_SESSION['carrito'] );
    $resul = insertar_pedido( $_SESSION[ 'carrito' ], $_SESSION[ 'usuario' ][ 'usuario' ]);
    if ( $resul === FALSE ) {
      echo "No se ha podido realizar el pedido<br>";
    } else {
      $correo = $_SESSION[ 'usuario' ][ 'correo' ];
      $compra = $_SESSION[ 'carrito' ]; 
      $_SESSION[ 'carrito' ] = []; //Vaciar carrito
      echo "Pedido realizado con exito, se enviará un correo de confirmación a : $correo";
      // enviar_correo( $compra, $pedido, $correo );
    }
  ?>
</body>
</html>