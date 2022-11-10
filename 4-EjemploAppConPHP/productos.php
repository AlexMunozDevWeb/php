<?php
  require 'sesiones.php';
  require_once 'bd.php';
  comprobar_sesion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de productos por categorías</title>
</head>
<body>
  <?php
    require 'cabecera.php';
    $cat = cargar_categoria( $_GET[ 'categoria' ] );
    $productos = cargar_productos_categoria( $_GET[ 'categoria' ] );
    if ( $cat === FALSE ) {
      echo '<p>Error al conectar con la base de datos.</p>';
    }
    foreach( $cat as $c){
      echo "<h1>" . $c[ 'Nombre' ] . "</h1>";
      echo "<p>" . $c[ 'Descripcion' ] . "</p>";
    }
    if ($productos === FALSE ) {
      echo '<p>No hay productos en esta categoria.</p>';
      exit;
    } 
  ?>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Peso</th>
      <th>Stock</th>
      <th>Comprar</th>
    </tr>
    <?php foreach( $productos as $product ): ?>
      <tr>
        <td><?php echo $product[ 'Nombre' ] ?></td>
        <td><?php echo $product[ 'Descripcion' ] ?></td>
        <td><?php echo $product[ 'Peso' ] ?></td>
        <td><?php echo $product[ 'Stock' ] ?></td>
        <td>
          <form action="anadir.php" method="post">
            <input type="number" name="unidades" min="1" value="1">
            <input type="submit" value="Comprar">
            <input type="hidden" name="cod" value="<?php echo $product[ 'CodPro' ] ?>">
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>