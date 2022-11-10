<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estructuras de control</title>
</head>
<body>
  <h2>Estructuras condicionales</h2>
  <?php
  // IF
  $var1 = 5;
  if ( $var1 === 5 ) echo 'igual<br>';
  echo $var1 == 0  ? 'igual<br>' : 'no igual<br>';
  if ( $var1 > 0 ) {
    echo 'mayor a 0<br>';
  }else{
    echo 'menor a 0<br>';
  }
  ?>
</body>
</html>