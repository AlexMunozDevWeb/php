<?php
  
  echo '<h2>Transacciones</h2>';
  echo '<p>Una transacciones consiste es un conjunto de operaciones que deben realizarse de forma atómica.
           Es decir, se realizan todas o no se realizada ninguna.</p>';
  
  try {
    $conexion = 'mysql:dbname=empresa;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';
    $bd = new PDO( $conexion, $usuario, $clave );
    echo "Conexión realizada con éxito";
    //Comienza la transaccion
    $bd->beginTransaction();
    $ins = "INSERT INTO usuarios(nombre, clave, rol) values ('Marta' , '3333' , '1');";
    $resultado = $bd->query($ins);
    //Se repite la consulta
    //Falla porque el nombre es un campo unico
    $resultado = $bd->query($ins);
    if ( $resultado ) {
      echo 'Error: ' . print_r( $bd->errorinfo() );
      //Deshace el primer cambio
      $bd->rollback();
      echo '<br>Transacción anulada<br>';
    } else {
      //Si hubiera ido bien
      echo '<br>Todo bien!<br>';
      $bd->commit();
    }
  } catch ( PDOException $e ) {
    echo 'Error al conectar ' . $e->getMessage();
  }
      
?>