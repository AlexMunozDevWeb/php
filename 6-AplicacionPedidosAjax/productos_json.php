
<?php 
  require_once 'bd.php';
  if ( !comprobar_sesion() )  return;

  $productos_array = [];
  $productos = cargar_productos_categoria( $_GET[ "categoria" ] );
 
  $pro_json = json_encode( iterator_to_array( $productos ) );
  echo $pro_json;
?>
