<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arrays</title>
</head>
<body>
  <h2>Arrays</h2>
  <?php
    $array1 = [
      0 => 444,
      1 => 222,
      2 => 333
    ];
    print_r( $array1 );
    echo "<br>" . "pos 0: " . $array1[0] . "<br>";
    $array1[0] = 555;
    print_r( $array1 );
    echo "<br>";
    $array2 = [
      "1111A" => "Juan Vera Ochoa" ,
      "1112A" => "Maria Mesa Cabeza" ,
      "1113A" => "Ana Puertas Peral" 
    ];

    $array2["1113A"] = 555;
    echo "<p><b>Nombres del array con un foreach normal</b></p>";
    foreach( $array2 as $nombre ){
      echo $nombre . "<br>";
    }
    echo "<p><b>Foreach con clave</b></p>";
    foreach( $array2 as $clave => $nombre ){
      echo "Codigo: $clave, nombre: $nombre<br>";
    }

    $arrayDias = [
      'Viernes' => 22,
      'Sábado' => 34
    ];

    //Asi no modifica el array
    foreach ( $arrayDias as $cantidad ) {
      $cantidad = $cantidad * 2;  
    }
    print_r( $arrayDias ); echo '<br>';

    //Asi modifica el array
    foreach ( $arrayDias as &$cantidad ) {
      $cantidad = $cantidad * 2;  
    }
    print_r( $arrayDias ); echo '<br>';

    echo "<p><b>Array sin posición asignada.</b></p>";
    
    $array_numeros = array( 10, 20, 30, 40 );
    print_r( $array_numeros ); echo '<br>';
    $array_numeros[] = 5; 
    print_r( $array_numeros ); echo '<br>';
    $array_numeros[10] = 6; 
    $array_numeros[] = 5; 
    print_r( $array_numeros ); echo '<br>';

    echo "<p><b>Unión de arrays.</b></p>";
    $array_num1 = array(
      10 => "3000",
      20 => "4000",
      30 => "6000"
    );
    print_r( $array_num1 ); echo '<br>';
    $array_num2 = array(
      10 => "8000",
      15 => "6000",
      20 => "4000"
    );
    print_r( $array_num2 ); echo '<br>';
    $array_num3 = $array_num1 + $array_num2;
    print_r( $array_num3 ); echo '<br>';

  ?>
</body>
</html>