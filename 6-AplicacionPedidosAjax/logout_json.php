<?php 
  require_once 'bd.php';
  if ( !comprobar_sesion() )  return;
  $_SESSION = array();
  session_destroy();
  setcookie( session_name(), 123, time() - 1000 );
?>