
<?php
  echo '<h2>Sesiones básico</h2>';
  session_start();
  echo 'La variable coutn vale: ' . $_SESSION[ 'count' ];
?>
