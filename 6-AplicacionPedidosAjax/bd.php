<?php

  function conexion_bd_mysql(){
    $conexion = 'mysql:dbname=pedidos;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';
    $bd = new PDO( $conexion, $usuario, $clave );
    return $bd;
  }

  function comprobar_usuario( $nombre_user, $clave_user ){
    try{
      $bd = conexion_bd_mysql();
      $sql = "SELECT * FROM restaurantes WHERE CodRes = '$nombre_user' and Clave = '$clave_user';";
      $usuario = $bd->query( $sql );
      if ($usuario === FALSE or $usuario->rowCount() === 0) {
        $bd = null;
        return FALSE;
      }else{
        foreach ($usuario as $row) {
          $cod_user = $row['CodRes'];
          $correo = $row['Correo'];
        }
        $bd = null;
        return [ 'usuario' => $cod_user , 'correo' => $correo];
      }
    } catch ( PDOException $e ) {
      echo 'Error con la base de datos: ' . $e->getMessage();
    }
  }

  function cargar_categorias(){
    try{
      $bd = conexion_bd_mysql();
      $sql = "SELECT * FROM categorias;";
      $categorias = $bd->query( $sql );
      if( $categorias === FALSE or $categorias->rowCount() === 0 ) {
        $bd = null;
        return FALSE;
      }else{
        $bd = null;
        return $categorias;
      }
    } catch ( PDOException $e ) {
      echo 'Error con la base de datos: ' . $e->getMessage();
    }
  }

  function comprobar_sesion(){
    session_start();
    if ( !isset( $_SESSION[ "usuario" ] ) ) {
      return FALSE;
    } else {
      return TRUE;
    }
  }

  function cargar_categoria( $cat ){
    try{
      $bd = conexion_bd_mysql();
      $sql = "SELECT * FROM categorias WHERE CodCat = $cat ;";
      $categorias = $bd->query( $sql );
      if( $categorias === FALSE or $categorias->rowCount() === 0 ) {
        $bd = null;
        return FALSE;
      }else{
        $bd = null;
        return $categorias;
      }
    } catch ( PDOException $e ) {
      echo 'Error con la base de datos: ' . $e->getMessage();
    }
  }

  function cargar_productos_categoria( $cat ){
    try{
      $bd = conexion_bd_mysql();
      $sql = "SELECT productos.* FROM productos, categorias WHERE productos.Categoria = $cat AND categorias.CodCat = $cat;";
      $categorias = $bd->query( $sql );
      if( $categorias === FALSE or $categorias->rowCount() === 0 ) {
        $bd = null;
        return '0';
        return FALSE;
      }else{
        $bd = null;
        return $categorias;
      }
    } catch ( PDOException $e ) {
      echo 'Error con la base de datos: ' . $e->getMessage();
    }
  }

  function cargar_productos( $codigoProductos ){
    try{
      $bd = conexion_bd_mysql();
      $texto_in = implode( ',', $codigoProductos );
      $sql = "SELECT * FROM productos WHERE CodPro in ($texto_in);";
      $productos = $bd->query( $sql );
      if( $productos === FALSE or $productos->rowCount() === 0 ) {
        $bd = null;
        return FALSE;
      }else{
        $bd = null;
        return $productos;
      }
    } catch ( PDOException $e ) {
      echo 'Error con la base de datos: ' . $e->getMessage();
    }
  }

  function insertar_pedido( $carrito, $CodRes ){
    try{
      $bd = conexion_bd_mysql();
      $bd->beginTransaction();
      $hora = date( "Y-m-d H:i:s", time() );
      //insertar pedido
      $sql = "INSERT INTO pedidos( Fecha, Enviado, Restaurante ) VALUES ( '$hora', 0, '$CodRes' )";
      $resul = $bd->query( $sql );
      if ( !$resul ) {
        return FALSE;
      }
      $pedido = $bd->lastInsertId();
      foreach( $carrito as $codPro => $unidades ){
        $sql = "INSERT INTO pedidosproductos( Pedido, Producto, Unidades ) VALUES( $pedido, $codPro, $unidades )";
        $resul = $bd->query( $sql );
        if ( !$resul ) {
          $bd->rollback();
          return FALSE;
        }
      }
      $sql = "UPDATE productos SET stock = stock - $unidades WHERE CodPro = $codPro";
      $resul = $bd->query( $sql );
      if ( !$resul ) {
        $bd->rollback();
        return FALSE;
      }
      $bd->commit();
      return $pedido;
    } catch ( PDOException $e ) {
      echo 'Error con la base de datos: ' . $e->getMessage();
    }
  }

?>