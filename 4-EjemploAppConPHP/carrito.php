
<?php
  require_once 'sesiones.php';
  require_once 'bd.php';
  comprobar_sesion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito de la compra</title>
</head>
<body>
  <?php
    require 'cabecera.php';
    $productos = cargar_productos( array_keys( $_SESSION[ 'carrito' ] ) );
    if ( $productos === FALSE ) {
      echo '<p>No hay productos en el pedido.</p>';
      exit;
    }
    if ( $productos != FALSE ): ?>
  
    <h2>Carrito de la compra</h2>
    <table>
      <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Peso</th>
        <th>Unidades</th>
        <th>Eliminar</th>
      </tr>
      <?php foreach( $productos as $product ): $cod = $product['CodPro']; ?>
      <tr>
        <td><?php echo $product['Nombre'] ?></td>
        <td><?php echo $product['Descripcion']; ?></td>
        <td><?php echo $product['Peso']; ?></td>
        <td><?php echo $_SESSION['carrito'][ $cod ]; ?></td>
        <td>
          <form action="eliminar.php" method="post">
            <input type="number" name="unidades" id="unidades" min="1" value="1">
            <input type="submit" value="Eliminar">
            <input type="hidden" name="cod" value="<?php echo $cod; ?>">
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
    <hr>
    <a href="procesar_pedido.php">Realizar pedido</a>
  <?php
    endif;
  ?>
</body>
</html>
